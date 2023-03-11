<?php

declare(strict_types=1);

namespace DemoPhpframework;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class genesis
{
    private $a_variable;

    private $response;


    public function __construct(string $a_variale, ResponseInterface $response)
    {
        $this->a_variable = $a_variale;
        $this->response = $response;
    }
    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write("<html><head></head><body>Hello, {$this->a_variable} world!</body></html>");

        return $response;
    }
}
