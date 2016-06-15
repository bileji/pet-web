<?php
/**
 * this source file is Template.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-06-15 14-02
 */
namespace App\Utils;

class Template
{
    const VERIFY = '【比乐集】您好，您的验证码是#code#，5分钟之内有效。如非本人操作请忽略本短信。';

    public function __construct($template, array $replace)
    {
        $this->template = str_replace(array_map(function ($item) {
            return '#' . $item . '#';
        }, array_keys($replace)), array_values($replace), $template);
    }

    public function get()
    {
        return $this->template;
    }
}