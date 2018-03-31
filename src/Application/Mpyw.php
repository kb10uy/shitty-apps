<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class Mpyw extends Kb10uyApplication
{
    /**
     * @var array
     * @Inject("data.mpyw")
     */
    public $mpyws;

    public function handle(): ResponseInterface
    {
        $result = array_rand($this->mpyws);
        $response = $this->response
            ->withHeader('Content-Type', 'text/plain')
            ->withStatus(302)
            ->withHeader('Location', $result);
        return $response;
    }
}
