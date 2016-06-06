<?php
/**
 * this source file is VerifyService.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-06 10-23
 */
namespace App\Http\Services;

use Illuminate\Support\Facades\Redis;

class VerifyService extends BootService
{
    # 短信验证码过期时间
    const VERIFY_CODE_EXPIRE_TIME = 300;

    # 缓存的键名
    protected static function cacheKey($account)
    {
        return 'vc_' . $account;
    }

    # 随机验证码
    protected static function rangeCode()
    {
        return mt_rand(100000, 999999);
    }

    # 生成短信/邮箱验证码
    public static function generate($account)
    {
        $range_code = static::rangeCode();

        return Redis::setex(static::cacheKey($account), static::VERIFY_CODE_EXPIRE_TIME, $range_code) ? $range_code : false;
    }

    # 验证短信/邮箱验证码
    public static function execute($account, $code)
    {
        $cache_key = static::cacheKey($account);

        return (Redis::exists($cache_key) && Redis::get($cache_key) == $code && Redis::delete($cache_key)) ? true : false;
    }
}