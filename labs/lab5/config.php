<?php
$host = 'localhost';
$db   = 'address_book';  
$user = 'root';         
$pass = '';           

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}
?>