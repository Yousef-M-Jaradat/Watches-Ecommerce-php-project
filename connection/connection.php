<?php $dsn = "mysql:host=localhost;dbname=watches";
$dbusername = "root";
$dbpassword = "";

try {
	$conn = new PDO($dsn, $dbusername, $dbpassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connection Successfully";
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>