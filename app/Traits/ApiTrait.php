<?php


namespace App\Traits;


use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\ApplicationContext;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

trait ApiTrait
{
    /**
     * @param array $content
     * @param string $message
     * @param int $code
     * @param int $resultCode
     * @param array $headers
     *
     * @return Psr7ResponseInterface
     */
    protected function success($content = [], $message = 'success', $code = 1000, $resultCode = 0, $headers = []): Psr7ResponseInterface
    {
        $response = ApplicationContext::getContainer()->get(ResponseInterface::class);
        list($headers, $data) = $this->resp($content, $message, $code, $resultCode, $headers);
        return $response->json($data)->withHeader('Server', 'hyperf-practice')->withHeader('X-Response-Time', time());
    }

    /**
     * @param string $message
     * @param int $code
     * @param int $resultCode
     * @param array $content
     * @param array $headers
     *
     * @return Psr7ResponseInterface
     */
    protected function error($message = 'error', $code = 1, $resultCode = 4000, $content = [], $headers = []): Psr7ResponseInterface
    {
        $response = ApplicationContext::getContainer()->get(ResponseInterface::class);
        list($headers, $data) = $this->resp($content, $message, $code, $resultCode, $headers);
        return $response->json($data)->withHeader('Server', 'hyperf-practice');
    }

    protected function resp($content, $message, $code, $resultCode, $headers): array
    {
        $headers = array_merge($headers, [
            'X-Response-Time' => time(),
        ]);
//        $content = $this->hump($content);// 不转驼峰
        $data = [];
        $data['msg'] = $message;
        $data['data'] = $content;
        $data['code'] = $resultCode == 0 ? $code : $resultCode;
        return [$headers, $data];
    }

    /**
     * 与java保持一致 转驼峰
     * @param  $content
     * @return null|string|string[]
     */
    protected function hump($content)
    {
        if (is_string($content)) return $content;
        $hump = [];
        if ($content) {
            $hump = preg_replace_callback('/[_]([a-zA-Z])(?=[^"]*?":)/',
                function ($matches) {
                    return strtoupper($matches[1]);
                }, json_encode($content));
            $hump = json_decode($hump, true);
        }
        return $hump;
    }
}