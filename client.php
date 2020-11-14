<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/13
 * Time: 20:32
 */
$client = new Swoole\Client(SWOOLE_SOCK_TCP);
echo "1" . PHP_EOL;
if (!$client->connect('192.168.0.70', 9500, -1)) {
    exit("connect failed. Error: {$client->errCode}\n");
}
echo "2" . PHP_EOL;

$rst = $client->send("hello world\n");

echo $client->recv();
$client->close();
