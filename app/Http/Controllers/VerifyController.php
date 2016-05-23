<?php
/**
 * this source file is VerifyController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-01
 */
namespace App\Http\Controllers;

use App\Utils\Helper;
use App\Http\Responses\Response;
use App\Http\Responses\Status;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Laravist\GeeCaptcha\GeeCaptcha;

class VerifyController extends Controller
{
    // 验证过期时间
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
            $user_id = Input::get("id");
            $cache_key = Helper::userIdCaptchaCacheKey($user_id);
            Cache::add($cache_key, $user_id, static::CAPTCHA_CACHE_EXPIRE_TIME);

            return Response::out(Status::SUCCESS, ['captcha_token' => $cache_key]);
        } else {
            return Response::out(Status::GET_GEE_CAPTCHA_ERROR);
        }
    }
}