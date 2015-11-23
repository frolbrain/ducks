<?php

namespace App\DB;

use Silex\Application;
class OrderRepository
{
	private $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function saveOrder($details, $ordered_products)
	{
		$sql = 'INSERT INTO `orders` (`fio`, `address`, `email`, `comment`)
		 VALUES (:fio, :address, :email, :comment)';
        $stmt = $this->app['db']->prepare($sql);
		$stmt->execute([
			'fio' => $details['fio'],
			'address' => $details['address'],
			'email' => $details['email'],
			'comment' => $details['comment']
		]);

		$sql = 'SELECT `id` FROM `orders` ORDER BY `id` DESC LIMIT 1';
        $stmt = $this->app['db']->prepare($sql);
		$stmt->execute();
		$lastid = $stmt->fetch(\PDO::FETCH_ASSOC);

		foreach ($ordered_products as $key => $value) {
			$sql = 'INSERT INTO `ordered_products` (`order_id`, `product_id`, `quantity`)
			 VALUES (:order_id, :product_id, :quantity)';
            $stmt = $this->app['db']->prepare($sql);
			$stmt->execute([
				'order_id' => $lastid['id'],
				'product_id' => $key,
				'quantity' => $value
			]);
		}
	}

	public function getOrders()
	{
	    $sql = "SELECT * FROM `orders`
	    ORDER BY `id`";
	    $stmt = $this->connection->prepare($sql);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}

	public function getOrder($id)
	{
	    $sql = "SELECT * FROM `orders` WHERE `id` = :id";
	    $stmt = $this->connection->prepare($sql);
	    $stmt->bindParam(':id', $id);
	    $stmt->execute();
	    return $stmt->fetch();
	}

		public function getProductsByOrder($id)
	{
	    $sql = "SELECT p.title, p.price, o.quantity
              FROM `ordered_products` AS o
              INNER JOIN `products` AS p
                  ON p.`id` = o.`product_id`
              WHERE o.`order_id` = :id";
        $stmt = $this->app['db']->prepare($sql);
	    $stmt->bindParam(':id', $id);
	    $stmt->execute();
	    return $stmt->fetchAll();
	}
}