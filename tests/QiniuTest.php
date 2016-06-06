<?php
/**
 * this source file is QiniuTest.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-24 21-02
 */
class QiniuTest extends TestCase
{
    public function testToken()
    {
        $response = $this->call('POST', 'qiniu/token', ['token' => $this->user['data']['token'], 'model' => 'message', 'platform' => 'web']);
        $this->assertContains('"code":0', $response->getContent());
    }
}