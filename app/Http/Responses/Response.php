<?php
/**
 * this source file is Response.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-05-23 15-44
 */
namespace App\Http\Responses;

class Response
{
    /**
     * @param $code
     * @param $data
     * @param $message
     * @return \App\Http\Responses\Response
     */
    public static function out($code, array $data = [], $message = '')
    {
        $response = [
            'code'    => $code,
            'data'    => $data,
            'message' => empty($message) ? Status::$errorMessage[$code] : $message,
        ];
        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}