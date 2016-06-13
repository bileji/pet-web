<?php
/**
 * this source file is UserController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 13-10
 */
namespace App\Http\Controllers;

use App\Http\Responses\Response;
use App\Http\Responses\Status;
use App\Http\Services\UserService;
use App\Utils\Helper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function signUp()
    {
        if (Cache::has(Input::get("captcha_token")) && Cache::pull(Input::get("captcha_token")) == Input::get("username")) {
            // 验证验证码
            if (Cache::pull(Helper::sendCacheKey(Input::get("username"))) != Input::get('verify')) {
                return Response::out(Status::VERIFY_ERROR);
            }
            $request = [
                "username"  => Input::get('username'),
                "password"  => Input::get('password'),
                "extension" => [
                    "nickname"         => Input::get('nickname'),
                    "sign_up_platform" => 'web 1.0.0',
                ],
            ];

            return UserService::signUp($request);
        } else {
            return Response::out(Status::SIGN_UP_INFO_ILLEGALITY);
        }
    }
}