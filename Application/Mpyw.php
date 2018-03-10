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
        var_dump($this);
        $response = $this->response
            ->withHeader('Content-Type', [
                'text/plain',
                'charset=utf-8',
            ])
            ->withStatus(200)
            ->withBody(stream_for('s'));
        return $response;
    }
}
