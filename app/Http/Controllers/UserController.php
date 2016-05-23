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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function signUp()
    {
        if (Cache::has(Input::get("captcha_token")) && Cache::pull(Input::get("captcha_token")) == Input::get("username")) {
            // todo 验证验证码

            $request = [
                "username"  => Input::get('username'),
                "password"  => Input::get('password'),
                "extension" => [
                    "nickname"         => Input::get('nickname'),
                    "sign_up_platform" => 'web_1.0.0',
                ],
            ];

            return UserService::signUp($request);
        } else {
            return Response::out(Status::SIGN_UP_INFO_ILLEGALITY);
        }
    }
}