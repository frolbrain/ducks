<?php
include_once __DIR__ . '/../src/helper/db.php';
include_once __DIR__ . '/../src/main.php';
//to page
$page = 'main';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
switch ($page) {
	case 'main':
		$page = new \App\Controller\Main($productRepository);
		$page->page();
		break;
	case 'add_to_cart':
		$page = new \App\Controller\AddToCart($productRepository);
		$page->page($_GET['id']);
		break;
	case 'catalog':
		$page = new \App\Controller\Catalog($catalogRepository);
		$page->page($_GET['id']);
		break;
	case 'product':
		include_once __DIR__ . '/../src/product.php';
		break;
	default:
		die('404');
		break;
}
?>
