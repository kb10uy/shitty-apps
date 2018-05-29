<?php
namespace Application;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Library\Kb10uyApplication;

class IpChecker extends Kb10uyApplication
{
    public function handle(): ResponseInterface
    {
        $params = $this->request->getServerParams();
        if (strpos($params['REMOTE_ADDR'], ':') === false) {
            $result = "IPv4";
        } else {
            $result = "IPv6";
        }
        $response = $this->response
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
        $response->getBody()->write("<html><head><title>You are connecting with</title><body><h1>$result</h1></body></html>");
        return $response;
    }
}
