<?php
namespace App\Controller;

use App\DB\CatalogRepository;
use Silex\Application;

class Catalog
{
  public function __construct(CatalogRepository $catalogRepository, Application $app)
  {
    $this->categoryRepository = $catalogRepository;
    $this->app = $app;
  }

  public function page($categoryId)
  {
    $products = $this->categoryRepository->getProductsForCategory($categoryId);
    $category_name = $this->categoryRepository->getCategoryName($categoryId);
    $this->render($products, $category_name, $categoryId);

    return $this->render($products, $category_name, $categoryId);
  }
  protected function render($products, $category_name, $categoryId)
  {
    return $this->app['twig']->render('catalog/page.twig', [
		'products' => $products,
		'category' => $category_name,
		'categoryId' => $categoryId
    ]);
  }
}
