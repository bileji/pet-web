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
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function signUp()
    {
        if (Cache::has(Input::get("captcha_token")) && Cache::get(Input::get("captcha_token")) == Input::get("phone")) {
            return UserService::signUp(Input::all());
        } else {
            return Response::out(Status::SIGN_UP_INFO_ILLEGALITY, Input::all());
        }
//        return Response::out(Status::SUCCESS, Request::all());
//        return UserService::signUp(Request::all());
    }
}