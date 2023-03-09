<?php

declare(strict_types=1);

namespace DemoPhpframework;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class genesis
{
    private $a_variale;

    private $response;


    public function __construct(string $a_variale, ResponseInterface $response)
    {
        $this->a_variale = $a_variale;
        $this->response = $response;
    }
    public function __invoke(): void
    {
        $response = $this->response -> withHeader('Content-Type', 'text/html');
    }
}
