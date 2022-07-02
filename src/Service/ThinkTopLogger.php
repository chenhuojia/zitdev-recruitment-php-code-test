<?php

namespace App\Service;

use App\Interfaces\LoggerInterface;
use think\facade\Log;

class ThinkTopLogger implements LoggerInterface
{

    private static $instance;

    public static function getInstance(array $config = [])
    {
        if (!self::$instance) self::$instance = new self($config);
        return self::$instance;
    }

    public function __clone()
    {
        return Log::error('clone error');
    }

    private function __construct(array $config = [])
    {
        if (!$config) $config = [
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ];
        Log::init($config);
    }

    public function info($message = '')
    {
        Log::info(strtoupper($message));
    }

    public function debug($message = '')
    {
        Log::debug(strtoupper($message));
    }

    public function error($message = '')
    {
        Log::error(strtoupper($message));
    }
}