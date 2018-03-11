<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class Mpyw extends Kb10uyApplication
{
    public const MPYW_URLS = [
        'https://twitter.com/mpyw',                                                 // 元祖ホモの輪
        'https://github.com/mpyw',                                                  // GitHub
        'https://qiita.com/mpyw',                                                   // Qiita
        'http://mpyw.hateblo.jp',                                                   // はてブロ
        'https://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q13149033688',    // 実務経験
        'http://nyaruko.com',                                                       // ニャル子
        'http://www.gochiusa.com',                                                  // ごちうさ
        'https://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q11152944766',    // くだらん解答
        'https://codeiq.jp/magazine/2015/11/31368/',                                // PHP界のプリンス
        'https://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q13173759308',    // ごちうさ難民的に
    ];

    public function handle(): ResponseInterface
    {
        $result = static::MPYW_URLS[array_rand(static::MPYW_URLS)];

        $response = $this->response
            ->withHeader('Content-Type', 'text/plain')
            ->withStatus(302)
            ->withHeader('Location', $result);
        return $response;
    }
}
