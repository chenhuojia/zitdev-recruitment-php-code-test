<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    /**
     * @doesNotPerformAssertions
     * @return void
     */
    public function testInfoLog()
    {
        echo PHP_EOL;
        echo '题目3'.PHP_EOL;
        echo 'think-log start'.PHP_EOL;
        $thinkLogger = new AppLogger('think-log');
        $thinkLogger->info('This is info log message [think-log]');
        echo 'think-log finish'.PHP_EOL;
        echo 'log4php start'.PHP_EOL;
        $logger = new AppLogger('log4php');
        $logger->info('This is info log message [log4php]');
        echo 'log4php finish'.PHP_EOL;
    }
}