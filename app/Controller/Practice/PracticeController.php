<?php


namespace App\Controller\Practice;


use App\Service\PracticeService;
use Hyperf\Di\Annotation\Inject;

/**
 * 依赖注入的两种方式 （inject自动注入和 __construct注）
 * Class PracticeController
 * @package App\Controller\Practice
 */
class PracticeController
{
    /**
     * @Inject()
     * @var PracticeService
     */
    private $practiceService;

//    public function __construct(PracticeService $practiceService)
//    {
//        $this->practiceService = $practiceService;
//    }

    public function index()
    {
        $this->practiceService->test('test');
    }
}