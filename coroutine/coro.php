<?php
/**
 * Created by PhpStorm.
 * User: Elton
 * Date: 2020/11/14
 * Time: 17:01
 */
//协程执行调度的方式 协程是异步方式
/*go(function () {
    // 创建一个协程
    \Swoole\Coroutine::sleep(1);
    echo "Im coroutine" . PHP_EOL;
});

echo "Hi, world!" . PHP_EOL;

go(function () {
    // 创建一个协程
    echo "Im coroutine no.2" . PHP_EOL;
});*/


//协程能够支撑并发的原因：协作方式，遇到IO的时候会让出CPU的执行权限，可以最大化的理由CPU资源
/*go(function(){
    for($i=0; $i<4; $i++){
        \Swoole\Coroutine::sleep(1);
    }
});*/
// time php coro.php => 查看执行时间

for($i=0; $i<4;$i++){
    go(function(){
        \Swoole\Coroutine::sleep(1);
    });
}
/*
[root@www coroutine]# time php coro.php
real	0m1.231s
user	0m0.019s
sys	0m0.009s
*/


//协程的使用场景：IO阻塞的场景，不适合CPU密集型

