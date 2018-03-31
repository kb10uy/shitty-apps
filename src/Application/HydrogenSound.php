<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class HydrogenSound extends Kb10uyApplication
{
    /**
     * @var array
     * @Inject("data.mpyw")
     */
    public $mpyws;

    public function handle(): ResponseInterface
    {
        $result = $this->mpyws[array_rand($this->mpyws)];
        $response = $this->response
            ->withHeader('Content-Type', 'text/plain')
            ->withStatus(200);
        $response->getBody()->write('あぁ〜！水素の音ォ〜！！');
        return $response;
    }
}
