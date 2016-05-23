<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
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

# 图形验证码
Route::group(['prefix' => 'verify'], function () {
    Route::get('captcha', 'VerifyController@info');

    # API
    Route::post('captcha', 'VerifyController@captcha');
//    $captcha = new GeeCaptcha('4f80a638af7e2350b04b7d2ce0508386', '81444990e20782d931fb59c2ac2f0ab3');
//    Route::get('captcha', function () use ($captcha) {
//        echo $captcha->GTServerIsNormal();
//    });
//    Route::post('captcha', function () use ($captcha) {
//        if ($captcha->isFromGTServer()) {
//            return $captcha->success() ? json_encode(['status' => 0, 'data' => 'success']) : json_encode(['status' => -10, 'data' => 'failed']);
//        }
//        return $captcha->hasAnswer() ? json_encode(['status' => 0, 'data' => 'answer']) : json_encode(['status' => -20, 'data' => 'no answer']);
//    });
});