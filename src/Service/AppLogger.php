<?php

namespace App\Service;

use App\Interfaces\LoggerInterface;
use App\Service\ThinkTopLogger;

class AppLogger implements LoggerInterface
{
    const TYPE_LOG4PHP   = 'log4php';
    const TYPE_LOG_THINK = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }else if($type == self::TYPE_LOG_THINK){
            $this->logger = ThinkTopLogger::getInstance();
        } else {
            throw new \Exception('error for log type;');
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}