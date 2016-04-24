<?php
/**
 * this source file is UserTest.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 13-12
 */

class UserTest extends TestCase
{
    public function testSignUp()
    {
        $response = $this->call('POST', 'user/signUp', ['username' => mb_substr(md5(time()), 0, 8), 'password' => 123456, 'extension' => ['sex' => 1, 'sign_up_ip' => '192.168.22.14', 'sign_up_platform' => 'web']]);
        $this->assertContains('"code":0', $response->getContent());
    }
}