<?php
/**
 * this source file is VerifyController.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-01
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Laravist\GeeCaptcha\GeeCaptcha;

class VerifyController extends Controller
{
    public function __construct()
    {
        $this->captcha = new GeeCaptcha(config("gee_captcha.id"), config("gee_captcha.key"));
    }

    public function info()
    {
        return $this->captcha->GTServerIsNormal();
    }

    public function captcha()
    {
        if ($this->captcha->isFromGTServer()) {
            return $this->captcha->success() ? json_encode(['status' => 0, 'data' => Input::get("id")]) : json_encode(['status' => -10, 'data' => 'failed']);
        }
        return $this->captcha->hasAnswer() ? json_encode(['status' => 0, 'data' => 'answer']) : json_encode(['status' => -20, 'data' => 'no answer']);
    }
}