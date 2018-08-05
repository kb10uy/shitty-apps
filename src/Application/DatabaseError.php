<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class DatabaseError extends Kb10uyApplication
{
    public function handle(): ResponseInterface
    {
        $mime = substr($this->request->getServerParams()['REQUEST_URI'], 1);
        $response = $this->response
            ->withHeader('Content-Type', $mime ?: 'text/html')
            ->withStatus(200);
        $response->getBody()->write("データベース接続確立エラー");
        return $response;
    }
}

