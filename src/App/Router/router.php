<?php

use App\Controller;

$app->get('/', function () use($app, $ProductRepository) {
	$page = new \App\Controller\Main($ProductRepository, $app);
	return $page->page();
})->bind('main');

$app->get('/side_menu', function () use($app, $CatalogRepository) {
	$page = new \App\Controller\SideMenu($CatalogRepository, $app);
	return $page->page();
})->bind('side_menu');

$app->get('/category/{id}', function($id) use($app, $CatalogRepository) {
	$page = new \App\Controller\Catalog($CatalogRepository, $app);
	return $page->page($id);
})->bind('show_category');

//$app->get('/', function () use ($app) {
////  products
//    $sql = 'SELECT * FROM  `products` limit 9';
//    $stmt = $app['db']->prepare($sql);
//    $stmt->execute();
//    $products = $stmt->fetchAll();
//    foreach ($products as $raw) {
//        $ptitle[] = "$raw[title]";
//        $pdescription[] = "$raw[description]";
//        $price[] = "$raw[price]";
//    };
//
////  categories
//    $sql = 'SELECT * FROM `categories`;';
//    $stmt = $app['db']->prepare($sql);
//    $stmt->execute();
//    foreach ($stmt as $raw) {
//        $titles[] = "$raw[title]";
//    };
//
////  image
//    $sql = 'SELECT `file_name` FROM `img` WHERE id=1;';
//    $stmt = $app['db']->prepare($sql);
//    $stmt->execute();
//    $imgname = $stmt->fetchColumn();
//
//    return $app['twig']->render('main_page.twig', [
//      'products' => $products,
//      'titles' => $titles,
//      'imgname' => $imgname,
//      'ptitle' => $ptitle,
//      'pdescription' => $pdescription,
//      'price' => $price,
//    ]);
//});

