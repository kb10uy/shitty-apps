<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;
use DI\Container;
use DI\ContainerBuilder;
use function DI\factory;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    ServerRequestInterface::class => factory([ServerRequest::class, 'fromGlobals']),
    ResponseInterface::class => function (ContainerInterface $c) {
        return new Response;
    },
    
]);
$container = $builder->build();

// execution
$request = $container->get(ServerRequestInterface::class);
$response = $container->get(ResponseInterface::class);

$response = (new \Application\Mpyw($request, $response))->handle();
$response->send();
// phpinfo();
// var_dump($request);
