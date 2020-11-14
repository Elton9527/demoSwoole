<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/13
 * Time: 17:22
 */

$server = new Swoole\Server('0.0.0.0', 9500);

$server->set(array(
    'daemonize' => false //后台运行
));

$server->on('connect', function(){
    echo "Connect success";
});

$server->on('close',function(){
    echo "close";
});

$server->on('receive',function(){
    echo "receive";
});

$server->start();




