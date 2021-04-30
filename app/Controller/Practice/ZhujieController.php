<?php


namespace App\Controller\Practice;

use Doctrine\Common\Annotations\Annotation\Target;
use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"ALL"})
 */
class ZhujieController extends AbstractAnnotation
{

    /**
     * @var string
     */
    public $name;

    public function test()
    {
        return $this->name;
    }
}