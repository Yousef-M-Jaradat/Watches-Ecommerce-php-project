<?php

$dbname='watches';
$host = 'localhost';
$username = 'root';
$password='';
$dsn="mysql:host=$host;dbname=$dbname";
try {
    $pdo = new PDO($dsn, $username,$password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>