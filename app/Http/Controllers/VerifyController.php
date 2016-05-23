<?php
/**
 * this source file is VerifyController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-01
 */
namespace App\Http\Controllers;

use Laravist\GeeCaptcha\GeeCaptcha;

class VerifyController extends Controller {

    public function info()
    {
        $captcha = new GeeCaptcha(config("gee_captcha.id"), config("gee_captcha.key"));
        return $captcha->GTServerIsNormal();
    }

    public function captcha()
    {

    }
}