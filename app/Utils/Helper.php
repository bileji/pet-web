<?php
/**
 * this source file is Helper.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 11-52
 */
namespace App\Utils;

class Helper
{
    /**
     * 手机号缓存键名
     * @param string $phone 手机号
     * @return string
     */
    public static function userIdCaptchaCacheKey($phone)
    {
        return md5("user-id-captcha-cache:" . $phone);
    }
}