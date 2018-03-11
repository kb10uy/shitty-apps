<?php
namespace Library;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use DI\Annotation\Inject;

class Kb10uyApplication
{
    /**
     * @Inject("request")
     * @var ServerRequestInterface
     */
    public $request;

    /**
     * @Inject("response")
     * @var ResponseInterface
     */
    public $response;

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
