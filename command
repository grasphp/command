#!/usr/bin/env php
<?php

use League\Container\Container;
use League\Container\ReflectionContainer;
use Symfony\Component\Console\Application;

require __DIR__ . '/vendor/autoload.php';

$version     = require __DIR__ . '/config/version.php';
$commands    = require __DIR__ . '/config/commands.php';
$container   = new Container;
$application = new Application('senki/command', 'v'.$version);

$container->delegate(
    (new ReflectionContainer)->cacheResolutions()
);

foreach ($commands as $commandName) {
    $application->add($container->get($commandName));
}

$application->run();
