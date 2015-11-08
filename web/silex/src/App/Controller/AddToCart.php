<?php
namespace App\Controller;
use App\DB\ProductRepository;
class AddToCart
{
  public function __construct(ProductRepository $productRepository)
  {
    $this->productRepository = $productRepository;
  }
  public function page($id)
  {
    $product = $this->productRepository->getProduct($id);
    $inCart = $_COOKIE['products'][$id];
    if ($inCart) {
      $inCart++;
    } else {
      $inCart = 1;
    }
    setcookie('products['.$id.']', $inCart, time() + (3600 * 24 * 7));
    header('Location: http://epic.li/test1.php');
  }
}
