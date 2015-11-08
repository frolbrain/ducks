<?php
namespace App\DB;
class Connection
{
  protected $connection;
  public function __construct()
  {
    $this->connection = $this->connect('root', 'root');
  }
  public function getConnection()
  {
    return $this->connection;
  }
  private function connect($username, $password)
  {
    try {
        $db = new \PDO(
            'mysql:host=my;dbname=duck_store;charset=utf8', $username, $password
        );
        $db->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    } catch(\PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        die();
    }
    return $db;
  }
}
