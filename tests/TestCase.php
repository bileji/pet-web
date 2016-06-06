<?php

use Illuminate\Support\Str;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    protected $user = [];
    protected $initUser = [];

    protected $baseUrl = 'http://localhost';

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function initUserInfo()
    {
        return $this->initUser = ['username' => Str::random(8), 'password' => 123456];
    }

    public function setUp()
    {
        parent::setUp();
        $initUserInfo = $this->initUserInfo();
        $response = $this->call('POST', 'user/signUp', ['username' => $initUserInfo['username'], 'password' => $initUserInfo['password'], 'extension' => ['sex' => 1, 'sign_up_ip' => '192.168.22.14', 'sign_up_platform' => 'web']]);
        $this->user = json_decode($response->getContent(), true);
    }
}
