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

$app->get('/product/{id}', function($id) use($app, $ProductRepository) {
	$page = new \App\Controller\Product($ProductRepository, $app);
	return $page->page($id);
})->bind('show_product');

$app->get('/add_to_cart/{product_id}', function ($product_id) use($app, $ProductRepository) {
    $cart = new \App\Controller\Cart($ProductRepository, $app);
    $cart->add($product_id);
	return $app->redirect('/');
})->bind('add_to_cart');
