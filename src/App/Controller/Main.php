<?php
namespace App\Controller;

use App\DB\ProductRepository;
use Silex\Application;
class Main
{
  private $productRepository;
  private $app;

  public function __construct(ProductRepository $productRepository, Application $app)
  {
    $this->productRepository = $productRepository;
    $this->app = $app;
  }
  public function page()
  {
    $products = $this->productRepository->getProducts();
    return $this->render($products);
  }
  protected function render($products)
  {
    return $this->app['twig']->render('/main/page.twig', [
      'products' => $products,
    ]);
  }
}
