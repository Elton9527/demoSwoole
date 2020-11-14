<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/14
 * Time: 12:20
 */

$client = new \Swoole\Client(SWOOLE_SOCK_UDP, SWOOLE_SOCK_SYNC);

$client->sendto('192.168.0.70', '9500', 'Hello, I am udp client');

echo $client->recv().PHP_EOL;
