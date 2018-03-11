<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->useAnnotations(true);
$builder->addDefinitions(__DIR__ . '/../src/container.php');
$container = $builder->build();

// execution
$shitName = $container->get('name');
$emitter = $container->get('emitter');

$shit = new $shitName;
$container->injectOn($shit);

$shit->before();
$response = $shit->handle();
$shit->after();

$emitter->emit($response);
