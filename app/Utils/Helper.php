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
     * 手机号/email缓存键名
     * @param string $account 手机号/email
     * @return string
     */
    public static function userIdCaptchaCacheKey($account)
    {
        return md5("user-id-captcha-cache:" . $account);
    }

    /**
     * 发送验证码缓存的键名
     * @param $account
     * @return string
     */
    public static function sendCacheKey($account)
    {
        return 'vc_' . $account;
    }

    public static function dailySendCacheKey($account)
    {
        return date('Y-m-d') . $account;
    }
}