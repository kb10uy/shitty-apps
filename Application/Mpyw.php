<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\Psr7\stream_for;

use Library\Kb10uyApplication;

class Mpyw extends Kb10uyApplication
{
    public function handle(): ResponseInterface
    {
        $response = $this->response
            ->withHeader('Content-Type', 'text/plain')
            ->withStatus(200);
        $response->getBody()->write('a');
        return $response;
    }
}
