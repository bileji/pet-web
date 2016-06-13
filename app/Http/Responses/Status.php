<?php

/**
 * this source file is Status.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-45
 */
namespace App\Http\Responses;

class Status
{
    const FAILED = -1000;
    const SUCCESS = 0;
    const PARAM_ERROR = 1000;
    const BUSINESS_ERROR = 2000;

    const GET_GEE_CAPTCHA_ERROR = -30000;
    const GET_GEE_CAPTCHA_INVALID = -30010;

    const SIGN_UP_INFO_ILLEGALITY = -40000;
    const VERIFY_ERROR = -40010;

    const SEND_VERIFY_FREQUENTLY = -50000;

    public static $errorMessage = [
        # 系统相关
        self::FAILED                  => '系统错误',
        self::SUCCESS                 => '执行成功',
        self::PARAM_ERROR             => '参数错误',
        self::BUSINESS_ERROR          => '业务错误',

        # 极验验证码相关
        self::GET_GEE_CAPTCHA_ERROR   => '获取图形验证码失败',
        self::GET_GEE_CAPTCHA_INVALID => '无效的图形验证码',

        self::SEND_VERIFY_FREQUENTLY  => '验证码发送过于频繁',

        self::VERIFY_ERROR            => '验证码错误',

        # 注册相关
        self::SIGN_UP_INFO_ILLEGALITY => '非法的注册信息',
    ];
}