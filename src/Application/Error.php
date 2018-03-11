<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class Mpyw extends Kb10uyApplication
{
    public function handle(): ResponseInterface
    {
        return $this->response->withStatus(500);
    }
}
