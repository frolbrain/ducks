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

$app->get('/cart/{in_cart}', function ($in_cart) use($app, $ProductRepository) {
	$page = new \App\Controller\Cart($ProductRepository, $app);
	return $page->page($in_cart);
})->bind('cart');

$app->get('/header', function () use($app, $ProductRepository) {
	$cart = new \App\Controller\Cart($ProductRepository, $app);
	$page = new \App\Controller\Header($cart, $app);
	return $page->page();
})->bind('header');

$app->get('/info', function () use($app) {
	$page = new \App\Controller\Info($app);
	return $page->page();
})->bind('info');

$app->get('/delivery', function () use($app) {
	$page = new \App\Controller\Delivery($app);
	return $page->page();
})->bind('delivery');

$app->get('/contacts', function () use($app) {
	$page = new \App\Controller\Contacts($app);
	return $page->page();
})->bind('contacts');

$app->get('/login/{state}', function ($state) use($app, $UserRepository) {
	$page = new \App\Controller\Login($UserRepository, $app);
	return $page->page($state);
})->bind('login_get');

$app->get('/order', function () use($app, $ProductRepository, $OrderRepository) {
	$page = new \App\Controller\Order($ProductRepository, $OrderRepository, $app);
	return $page->order();
})->bind('order');