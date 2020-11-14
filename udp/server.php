<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/14
 * Time: 12:06
 */

// 进程模式, UDP连接
$server = new Swoole\Server('0.0.0.0', 9500, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->set(array(
    'daemonize' => false, //后台运行
    'enable_coroutine' => false, //是否自动开启协程
));

$server->on('packet', function ($server, $data, $clientInfo) {
    echo "接收客户端消息:".$data.PHP_EOL;
    //var_dump($clientInfo);
    $server->sendto($clientInfo['address'], $clientInfo['port'], '1122222');
});

// UDP模式没有 connect 和 close 事件，只进行发送
/*$server->on('connect', function ($server, $fd) {
    echo "Client:Connect.\n";
});

$server->on('close', function ($server, $fd) {
    echo "Client: Close.\n";
});*/

$server->start();




