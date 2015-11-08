<?php
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
        'charset'  => 'UTF8',
    ),
));

        // Main Page //
$app->get('/', function () use ($app) {
//  products
    $sql = 'SELECT * FROM  `products` limit 9';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    foreach ($products as $raw) {
        $ptitle[] = "$raw[title]";
        $pdescription[] = "$raw[description]";
        $price[] = "$raw[price]";
    };

//  categories
    $sql = 'SELECT * FROM `categories`;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $titles[] = "$raw[title]";
    };

//  image
    $sql = 'SELECT `file_name` FROM `img` WHERE id=1;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    $imgname = $stmt->fetchColumn();

    return $app['twig']->render('main_page.twig', [
      'products' => $products,
      'titles' => $titles,
      'imgname' => $imgname,
      'ptitle' => $ptitle,
      'pdescription' => $pdescription,
      'price' => $price,
    ]);
});

        // Catalog Page //
$app->get('/catalog', function () use ($app) {

//  categories
    $sql = 'SELECT * FROM `categories`;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $titles[] = "$raw[title]";
        $descriptions[] = "$raw[description]";
    };
//  products
    $sql = 'SELECT * FROM  `products` limit 9';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    foreach ($products as $raw) {
        $ptitle[] = "$raw[title]";
        $pdescription[] = "$raw[description]";
        $price[] = "$raw[price]";
    };
//  image
    $sql = 'SELECT `file_name` FROM `img` WHERE id=1;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    $imgname = $stmt->fetchColumn();

    return $app['twig']->render('catalog.twig', [
        'titles' => $titles,
        'products' => $products,
        'imgname' => $imgname,
        'ptitle' => $ptitle,
        'pdescription' => $pdescription,
        'price' => $price,
    ]);
});
$app->get('/catalog/{category}', function ($category) use ($app) {
//  product by category
    $sql = 'SELECT p.price, p.description, p.title, p.img_id FROM `products` AS p
             INNER JOIN `categories` AS c
             ON  p.`category_id` = c.`id`
             WHERE c.`title` = :category;';
    $stmt = $app['db']->prepare($sql);
    $stmt->bindValue('category', $category);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $ptitle[] = "$raw[title]";
        $img[] = "$raw[img_id]";
        $price[] = "$raw[price]";
        $pdescription[] = "$raw[description]";
    };
//  categories
    $sql = 'SELECT * FROM `categories`;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $titles[] = "$raw[title]";
    };

//  image
    $sql = 'SELECT `file_name` FROM `img` WHERE id = :id;';
    $stmt = $app['db']->prepare($sql);
    $stmt->bindValue('id', $img[0]);
    $stmt->execute();
    $imgname = $stmt->fetchColumn();

//  exit
    return $app['twig']->render('catalog.twig', [
        'titles' => $titles,
        'ptitle' => $ptitle,
        'imgname' => $imgname,
    ]);
});

        //Single Item Page //
$app->get('/{single_item}', function ($single_item) use ($app) {
//  categories
    $sql = 'SELECT * FROM `categories`;';
    $stmt = $app['db']->prepare($sql);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $titles[] = "$raw[title]";
    };

//  single item desc
    $sql = 'SELECT * FROM `products` WHERE `title` = :single_item;';
    $stmt = $app['db']->prepare($sql);
    $stmt->bindValue('single_item', $single_item);
    $stmt->execute();
    foreach ($stmt as $raw) {
        $ptitle[] = "$raw[title]";
        $img[] = "$raw[img_id]";
        $price[] = "$raw[price]";
        $pdescription[] = "$raw[description]";
    };

//  image
    $sql = 'SELECT `file_name` FROM `img` WHERE id = :id;';
    $stmt = $app['db']->prepare($sql);
    $stmt->bindValue('id', $img[0]);
    $stmt->execute();
    $imgname = $stmt->fetchColumn();

//  exit
    return $app['twig']->render('single_item.twig', [
        'titles' => $titles,
        'ptitle' => $ptitle,
        'imgname' => $imgname,
        'pdescription' => $pdescription,
        'price' => $price,
    ]);
});
$app->run();
