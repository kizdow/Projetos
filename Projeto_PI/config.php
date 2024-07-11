<?php 
$db = "pi_db";
$user = "root";
$password = "";
$host = "localhost";
$charset = "UTF8mb4";

$dns = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dns, $user, $password);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
};
?>