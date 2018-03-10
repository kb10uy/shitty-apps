<?php
namespace Library;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Kb10uyApplication
{
    /** @var ServerRequestInterface */
    public $request;

    /** @var ResponseInterface */
    public $response;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function before(): void
    {
        // do something before action
    }

    public function handle(): ResponseInterface
    {
        // handle action
    }

    public function after(): void
    {
        // do something after response
    }
}
