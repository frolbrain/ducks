<?php
namespace App\DB;

use Silex\Application;
class ProductRepository
{
  private $app;
  public function __construct(Application $app)
  {
      $this->app = $app;
  }
  public function getProducts()
  {
      $sql = 'SELECT * FROM  `products` AS p
              INNER JOIN `img` AS i
              ON i.`id` = p.`img_id` limit 9';
      $stmt = $this->app['db']->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
  }
}
