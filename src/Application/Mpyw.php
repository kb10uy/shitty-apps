<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\Psr7\stream_for;

use Library\Kb10uyApplication;

class Mpyw extends Kb10uyApplication
{
    public const MPYW_URLS = [
        'https://twitter.com/mpyw',
        'https://github.com/mpyw',
        'https://qiita.com/mpyw',
        'http://mpyw.hateblo.jp',
        'https://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q13149033688',
        'http://nyaruko.com',
        'http://www.gochiusa.com',
    ];

    public function handle(): ResponseInterface
    {
        $number = mt_rand(0, count(static::MPYW_URLS) - 1);
        $result = static::MPYW_URLS[$number];

        $response = $this->response
            ->withHeader('Content-Type', 'text/plain')
            ->withStatus(302)
            ->withHeader('Location', $result);
        return $response;
    }
}
