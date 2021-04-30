<?php


namespace App\Controller\Practice;

use App\Controller\BaseController;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController()
 * @ZhujieController(name="123")
 */
class UseZhujieController extends BaseController
{
    //注解的使用场景 给类属性添加注解类 可以使用注解对象的所有东西 路由的使用 配置的使用等

    public function test1()
    {
        $res = AnnotationCollector::getClassesByAnnotation(ZhujieController::class); //获取到注解类的实例
        var_dump($res);
        return $this->success($res);
    }
}