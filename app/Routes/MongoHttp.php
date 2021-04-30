<?php

use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api',function (){
    Router::post('/mongo/insert', [\App\Controller\MongoHttp\MongoController::class, "insert"]);//检测登录
});