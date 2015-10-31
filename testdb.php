<?php
$user = 'root';
$pass = 'root';
$host = 'my';
$dbname = 'duck_store';

$dsn = "mysql:host=$host;dbname=$dbname";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$db = new PDO($dsn, $user, $pass, $opt);

$stmt = $db->prepare("SELECT * FROM duck_store.categories;");
$stmt->execute();
var_dump($stmt);
