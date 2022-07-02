<?php

namespace Test\Service;

use App\Util\HttpRequest;
use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;
use App\App\Demo;

/**
 * Class DemoTest
 */
class DemoTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     * @return void
     */
    public function testDemo()
    {
        $logger = new AppLogger('log4php');
        echo PHP_EOL;
        $logger->info('题目2');
        $result = (new Demo($logger,(new HttpRequest())))->get_user_info();
        if (!is_null($result))
        {
            $this->assertNotNull($result);
            $this->assertArrayHasKey('error',$result);
            $this->assertArrayHasKey('data',$result);
            $this->assertArrayHasKey('id',$result['data']);
            $this->assertArrayHasKey('username',$result['data']);
            $logger->info('接口数据正常：'.var_export($result,true));
            return;
        }
        $logger->error('接口异常');
    }
}