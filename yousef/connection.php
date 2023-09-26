<?php $dsn = "mysql:host=localhost;dbname=watches";
$dbusername = "root";
$dbpassword = "";

try {
	$pdo = new PDO($dsn, $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connection Successfully";
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>