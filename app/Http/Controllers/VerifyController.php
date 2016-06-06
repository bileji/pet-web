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
            $user_id = Input::get("account");
            $cache_key = Helper::userIdCaptchaCacheKey($user_id);
            Cache::add($cache_key, $user_id, static::CAPTCHA_CACHE_EXPIRE_TIME);

            return Response::out(Status::SUCCESS, ['captcha_token' => $cache_key]);
        } else {
            return Response::out(Status::GET_GEE_CAPTCHA_ERROR);
        }
    }

    # 发送验证码
    public function sendCode()
    {
        if ($range_code = VerifyService::generate(Input::get('account'))) {
            // todo add verify code to gearman async
            Log::info(Input::get('account') . ':OO:' . $range_code);
            return Response::out(Status::SUCCESS);
        } else {
            return Response::out(Status::FAILED);
        }
    }

    # 验证验证码 todo
    public function checkCode()
    {

    }
}