<?php
/**
 * this source file is UserController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 13-10
 */
namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function signUp()
    {
        return UserService::signUp(Request::all());
    }
}