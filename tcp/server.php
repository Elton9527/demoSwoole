<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/13
 * Time: 17:22
 */

$server = new Swoole\Server('0.0.0.0', 9500);

$server->set(array(
    'daemonize' => false, //后台运行
    'enable_coroutine' => false, //是否自动开启协程
));


$server->on('connect', function ($server, $fd) {
    echo "Client:Connect.\n";
});

$server->on('receive', function ($server, $fd, $reactor_id, $data) {
    $server->send($fd, 'Swoole: ' . $data);
    $server->close($fd);
});

$server->on('close', function ($server, $fd) {
    echo "Client: Close.\n";
});

$server->start();




