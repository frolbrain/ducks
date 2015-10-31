<?php
  //Переменные подключения
$user = 'root';
$pass = 'root';
$host = 'my';
$dbname = 'duck_store';
$charset = 'UTF8';

  // Коннектор
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$db = new PDO($dsn, $user, $pass, $opt);

  //Функция выборки списка продуктов
function get_products($db){
    $stmt = $db->query("SELECT * FROM `products` LIMIT 3");
    return $stmt->fetchAll();
}

  //Функция выборки списка категрий
function get_categories($db){
    $stmt = $db->query("SELECT * FROM `categories` LIMIT 3");
    return $stmt->fetchAll();
}

  //Функция выборки подукта
function get_product($db, $id){
  $stmt = $db->prepare(
        "SELECT p.id, p.title, p.description, p.price, c.title AS c_title
        FROM `products` AS p
        INNER JOIN `categories` AS c
        ON p.`category_id` = c.`id`
        WHERE p.`id` = :id"
  );
  $stmt->bindParam(":id", $id);
  $stmt->execute();
}
  //Функция сборки SQL запроса из POST
function pdoSet($fields, &$values, $source = array()) {
  $set = '';
  $values = array();
  if (!$source) $source = &$_POST;
  foreach ($fields as $field) {
    if (isset($source[$field])) {
      $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
      $values[$field] = $source[$field];
    }
  }
  return substr($set, 0, -2);
}
?>
