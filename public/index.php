<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use DI\Container;
use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    ServerRequestInterface::class => function (ContainerInterface $c) {
        return ServerRequestFactory::fromGlobals();
    },
    ResponseInterface::class => function (ContainerInterface $c) {
        return new Response;
    },
    'emitter' => function (ContainerInterface $c) {
        return new SapiEmitter;
    }
]);
$container = $builder->build();

// execution
$request = $container->get(ServerRequestInterface::class);
$response = $container->get(ResponseInterface::class);
$emitter = $container->get('emitter');

$response = (new \Application\Mpyw($request, $response))->handle();
$emitter->emit($response);
