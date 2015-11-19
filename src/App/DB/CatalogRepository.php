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
	public function getProductsForCategory($categoryId)
	{
	    $sql = "SELECT * FROM `img` AS i
				    INNER JOIN `products` AS p
				        ON p.`category_id` = i.`id`
				WHERE `category_id` = :id";
	    $stmt = $this->app['db']->prepare($sql);
	    $stmt->bindParam(':id', $categoryId);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}
	public function getCategoryName($categoryId)
	{
	    $sql = "SELECT `title` FROM `categories` WHERE `id` = :id";
	    $stmt = $this->app['db']->prepare($sql);
	    $stmt->bindParam(':id', $categoryId);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}

}
