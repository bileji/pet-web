<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
    //    return view('welcome');
});

Route::get('/test', function () {
    return view('user.sign_in');
});

// 测试angular
Route::get('/angular', function () {
    return view('angulars.index');
});

# 用户
Route::group(['prefix' => 'user'], function () {
    # 页面
    Route::get('sign_up', function () {
        return view('user.sign_up');
    });
    Route::get('sign_in', function () {
        return view('user.sign_in');
    });

    # API
    Route::post('signUp', 'UserController@signUp');
});

Route::group(['prefix' => 'qiniu'], function () {
    Route::post('token', 'QiniuController@token');
});