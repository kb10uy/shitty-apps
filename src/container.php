<?php

use Psr\Container\ContainerInterface;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;

const DATA_DIR = __DIR__ . '/../data/';

return [
    'emitter' => function (ContainerInterface $c) {
        return new SapiEmitter;
    },
    'request' => function (ContainerInterface $c) {
        return ServerRequestFactory::fromGlobals();
    },
    'response' => function (ContainerInterface $c) {
        return new Response;
    },
    'name' => function (ContainerInterface $c) {
        $request = $c->get('request');
        $class = $request->getServerParams()['SHIT_NAME'] ?? 'Error';
        return '\Application\\' . $class;
    },

    'data.mpyw' => function (ContainerInterface $c) {
        $urls = include_once DATA_DIR . 'mpyw.php';
        return $urls;
    },
    'data.elements' => function (ContainerInterface $c) {
        $elements = include_once DATA_DIR . 'elements.php';
        return $elements;
    },
];
