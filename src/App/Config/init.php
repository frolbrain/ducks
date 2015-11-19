<?php

$app->register(new Silex\Provider\TwigServiceProvider(), [
  'twig.path' => __DIR__.'/../../../views',
]);
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'duck_store',
        'host'     => 'my',
        'user'     => 'root',
        'password' => 'root',
        'charset'  => 'UTF8',
    ),
));
$app->register(new Silex\Provider\HttpFragmentServiceProvider());