<?php

declare(strict_types=1);

use League\Container\Container;
use League\Container\ReflectionContainer;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;

require __DIR__ . '/vendor/autoload.php';

// Init App.
$app = new Application('senki/command', 'v1.2.0');

// Dependency Container.
$container = new Container();
$container->delegate(
    (new ReflectionContainer())->cacheResolutions()
);

// Load Commands to App.
$commands = require __DIR__ . '/config/commands.php';
$loader = new ContainerCommandLoader($container, $commands);

$app->setCommandLoader($loader);

if (array_key_exists('run', $commands)) {
    $app->setDefaultCommand('run');
}

// Run Forest, run.
$app->run();
