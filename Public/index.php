<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';
use DI\ContainerBuilder;
use DemoPhpframework\genesis;
use Relay\Relay;
use Laminas\Diactoros\ServerRequestFactory;

use function DI\create;

//dependency injection but using the libray php-di
$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
//$containerBuilder->useAnnotations(false); // annotations are now disabled by default no need to add them
$containerBuilder->addDefinitions([

    genesis::class => create(genesis::class)
]);

// understanding namespaces in php https://www.php.net/manual/en/language.namespaces.rationale.php#116280

//what does the container Builder or libray do: it automatically injects a dependecny for your class parameter so you don't have to instantiate the classes (not like the class is not being instantiated but you will not need to use new Keyword, etc)
$container = $containerBuilder->build();

$middlewareQueue = [];

$requestHandler = new Relay($middlewareQueue);
$inTheBegining = $container->get(genesis::class);

$inTheBegining->announce();


//the laminas diactoros package is to implemnet a PSR-7 compatible HTTP Messages
