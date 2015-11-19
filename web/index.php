<?php
require_once __DIR__.'/../vendor/autoload.php';
session_start();

use App\DB;

$app = new Silex\Application();
$app['debug'] = true;

$ProductRepository = new DB\ProductRepository($app);
$CatalogRepository = new DB\CatalogRepository($app);

require_once __DIR__.'/../src/App/Router/router.php';
require_once __DIR__.'/../src/App/Config/init.php';

$app->run();