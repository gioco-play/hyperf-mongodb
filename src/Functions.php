<?php

declare(strict_types=1);

use GiocoPlus\Mongodb\MongoDbConst;

if (!function_exists('micro_timestamp')) {
    /**
     * 時間戳
     *
     * @return int
     */
    function micro_timestamp(): int {
        return intval(round(microtime(true) * 1000));
    }
}

if (!function_exists('mongodb_pool_config')) {
    /**
     * MongoDb 連結池
     *
     * @param string $host
     * @param string $dbName
     * @param integer $port
     * @param string $replica
     * @param string $readPreference
     * @param integer $maxConn
     * @param float $connTimeout
     * @param float $maxIdleTime
     * @param string $username
     * @param string $password
     * @param string $authMechanism
     * @return array
     */
    function mongodb_pool_config(string $host, string $dbName, int $port = 27017, string $replica = 'rs0', string $readPreference = MongoDbConst::ReadPrefPrimary,
                                 int $maxConn = 100, float $connTimeout = 10, float $maxIdleTime = 60,
                                 string $username = '', string $password = '', string $authMechanism = 'SCRAM-SHA-256'): array {
        return [
            'username' => $username,
            'password' => $password,
            'host' => $host,
            'port' => $port,
            'db' => $dbName,
            'authMechanism' => $authMechanism,
            'replica' => $replica,
            'readPreference' => $readPreference,
            'pool' => [
                'min_connections' => 1,
                'max_connections' => $maxConn,
                'connect_timeout' => $connTimeout,
                'wait_timeout' => 3.0,
                'heartbeat' => -1,
                'max_idle_time' => $maxIdleTime,
            ]
        ];
    }

}