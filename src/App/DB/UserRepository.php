<?php

namespace App\DB;
use Silex\Application;
class UserRepository
{
	private $app;

	public function __construct(Application $app)
	{
        $this->app = $app;
	}

	public function getUserByUsername($username)
	{
		$sql = 'SELECT * FROM `users` WHERE `username` = :username';
        $stmt = $this->app['db']->prepare($sql);
		$stmt->execute(['username' => $username]);
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function saveUser($username, $password)
	{
		$sql = 'INSERT INTO `users` (`username`, `password`)
		 VALUES (:username, :password)';
        $stmt = $this->app['db']->prepare($sql);
		$stmt->execute([
			'username' => $username,
			'password' => $password
		]);
	}
}