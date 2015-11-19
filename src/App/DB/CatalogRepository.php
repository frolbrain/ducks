<?php
namespace App\DB;

use Silex\Application;
class CatalogRepository
{
  private $app;
  public function __construct(Application $app)
  {
      $this->app = $app;
  }
  public function getCategoryNames()
  {
    $sql = "SELECT * FROM `categories` ORDER BY `id`";
    $stmt = $this->app['db']->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
