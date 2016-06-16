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

    /**
     * 发送验证码缓存键名
     * @param $account
     * @return string
     */
    public static function hourUnique($account)
    {
        return date('Y-m-d') . $account;
    }

    public static function clientIP()
    {
        $ip = false;
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) {
                array_unshift($ips, $ip);
                $ip = false;
            }
            for ($i = 0; $i < count($ips); $i++) {
                if (!preg_match('/^(10|172.16|192.168)./', $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}