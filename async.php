<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/14
 * Time: 11:18
 */

// 创建异步客户端
$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

// 绑定事件
$client->on('connect', function($client){
    echo "Client Connect Success".PHP_EOL;
});

$client->on('receive', function($client, $data){
    echo "Client receive：".$data.PHP_EOL;
});


// PHP Fatal error:  Swoole\Client::connect(): no 'onError' callback function in /var/www/demoSwoole/async.php on line 25
// 事件都需要绑定
$client->on('error', function($client){
    echo "Client error".PHP_EOL;
});


$client->on('close', function($client){
    echo "Client Close".PHP_EOL;
});

if(!$client->connect('192.168.0.70', 9500, 0.5)){
    exit("链接失败:".$client->errCode);
};

$client->close();
