<?php
/**
 * this source file is VerifyController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-01
 */
namespace App\Http\Controllers;

use App\Http\Services\VerifyService;
use App\Utils\Helper;
use App\Http\Responses\Response;
use App\Http\Responses\Status;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Laravist\GeeCaptcha\GeeCaptcha;

class VerifyController extends Controller
{
    # 验证过期时间
    const CAPTCHA_CACHE_EXPIRE_TIME = 5;

    public function __construct()
    {
        $this->captcha = new GeeCaptcha(config("gee_captcha.id"), config("gee_captcha.key"));
    }

    public function info()
    {
        return $this->captcha->GTServerIsNormal();
    }

    public function captcha()
    {
        if ($this->captcha->isFromGTServer() && $this->captcha->success()) {
            $account = Input::get("account");
            $cache_key = Helper::userIdCaptchaCacheKey($account);
            Cache::add($cache_key, $account, static::CAPTCHA_CACHE_EXPIRE_TIME);
            return Response::out(Status::SUCCESS, ['captcha_token' => $cache_key]);
        } else {
            return Response::out(Status::GET_GEE_CAPTCHA_ERROR);
        }
    }

    # 发送验证码
    public function sendCode()
    {
        $account = Input::get('account');
        if ($account == Cache::get(Helper::userIdCaptchaCacheKey($account))) {
            if ($range_code = VerifyService::generate($account)) {
                // todo add verify code to gearman async
                Log::info('your verify code is' . $range_code);
                // 发送成功
                return Response::out(Status::SUCCESS);
            } else {
                // 验证太频繁
                return Response::out(Status::SEND_VERIFY_FREQUENTLY);
            }
        } else {
            // 图形验证码失效
            return Response::out(Status::GET_GEE_CAPTCHA_INVALID);
        }
    }

    # 验证验证码 todo
    public function checkCode()
    {

    }
}