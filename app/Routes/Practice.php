<?php

use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api', function () {
    Router::get('/practice/test', [\App\Controller\Practice\UseZhujieController::class, "test1"]);
});