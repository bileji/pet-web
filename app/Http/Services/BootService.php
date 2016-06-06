<?php
/**
 * this source file is BootService.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 11-56
 */
namespace App\Http\Services;

use JsonRPC\Client;

class BootService
{
    const PARAM_LEN_ZE = 0;
    const PARAM_LEN_ON = 1;
    const PARAM_LEN_TW = 2;
    const PARAM_LEN_TH = 3;
    const PARAM_LEN_FO = 4;

    protected $route = '/';

    public function callService($method, $params)
    {
        $client = new Client(config('rpc.service.host') . $this->route);
        return $client->execute($method, array_shift($params));
    }

    public function __call($method, $params)
    {
        return $this->callService($method, $params);
    }

    public static function __callStatic($method, $params)
    {
        return (new static())->callService($method, $params);
    }
}