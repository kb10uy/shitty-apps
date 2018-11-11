<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class DatabaseError extends Kb10uyApplication
{
    private const GENERAL_RESPONSE = 'データベース接続確立エラー';
    private const HTML_RESPONSE = '<!doctype html><html><head><title>データベース接続確立エラー</title></head><body><h1>データベース接続確立エラー</h1></body></html>';
    public function handle(): ResponseInterface
    {
        $default = 'text/html';
        $accept = $this->request->getHeader('Accept')[0];
        $query = substr($this->request->getServerParams()['REQUEST_URI'], 1);
        if ($accept) {
            $accept = trim(explode(',', $accept)[0]);
        }
        $mime = $query ?: $accept ?: $default;
        $response = $this->response
            ->withHeader('Content-Type', $mime)
            ->withStatus(200);
        $response->getBody()->write($mime === 'text/html' ? self::HTML_RESPONSE : self::GENERAL_RESPONSE);
        return $response;
    }
}

