<?php
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), [
  'twig.path' => __DIR__.'/../views',
]);

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'duck_store',
        'host'     => 'my',
        'user'     => 'root',
        'password' => 'root',
    ),
));

// $app->get('Hello/{name}', function ($name) use ($app) {
//     return 'Hello '.$app->escape($name);
// });

$app->get('/', function () use ($app) {
    return $app['twig']->render('main_page.twig');
});

$app->get('/', function () use ($app) {
    $sql = "select * from  `products` limit 6";
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll;

    return $app['twig']->render([
      'products' => $products
    ]);
});

$app->get('/ptoduct/{id}', function ($id) use ($app){
  $sql = 'select * from `products` as p where p.id = :id';
  $stmt = $app['db']->executeQery[$sql];
})->bind('show_product');
$app->run();
