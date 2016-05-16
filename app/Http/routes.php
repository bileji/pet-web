<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
    //    return view('welcome');
});

Route::get('/test', function() {
    return view('user.sign_in');
});

// 测试angular
Route::get('/angular', function () {
    return view('angulars.index');
});

Route::group(['prefix' => 'user'], function () {
    # 页面
    Route::get('sign_up', function() {
        return view('user.sign_up');
    });

    # API
    Route::post('signUp', 'UserController@signUp');
});

Route::group(['prefix' => 'qiniu'], function () {
    Route::post('token', 'QiniuController@token');
});