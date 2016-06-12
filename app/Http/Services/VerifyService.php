<?php
/**
 * this source file is VerifyService.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-06 10-23
 */
namespace App\Http\Services;

use App\Utils\Helper;
use Illuminate\Support\Facades\Cache;

class VerifyService extends BootService
{
    # 短信验证码过期时间
    const VERIFY_CODE_EXPIRE_TIME = 300;

    # 每日发送验证码数量限制
    const HOUR_SEND_VERIFY_CODE_LIMIT = 3;

    # 随机验证码
    protected static function rangeCode()
    {
        return mt_rand(100000, 999999);
    }

    # 生成短信/邮箱验证码
    public static function generate($account)
    {
        $dailyKey = Helper::dailySendCacheKey($account);

        !Cache::has($dailyKey) && Cache::add($dailyKey, 1, 3600);

        if (Cache::get($dailyKey) > static::HOUR_SEND_VERIFY_CODE_LIMIT) {
            return false;
        }

        ($range_code = static::rangeCode()) && Cache::put(Helper::sendCacheKey($account), $range_code, static::VERIFY_CODE_EXPIRE_TIME);

        return Cache::increment($dailyKey) ? $range_code : false;
    }

    # 验证短信/邮箱验证码
    public static function execute($account, $code)
    {
        $cache_key = Helper::sendCacheKey($account);

        return (Cache::has($cache_key) && Cache::pull($cache_key) == $code) ? true : false;
    }
}