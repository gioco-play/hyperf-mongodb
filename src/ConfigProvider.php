<?php

namespace GiocoPlus\Mongodb;


class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                MongoDb::class => \GiocoPlus\Mongodb\MongoDb::class,
            ],
            'commands' => [
            ],
            'scan' => [
                'paths' => [
                    __DIR__,
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config of mongodb client.',
                    'source' => __DIR__ . '/publish/mongodb.php',
                    'destination' => BASE_PATH . '/config/autoload/mongodb.php',
                ],
            ],
        ];
    }
}