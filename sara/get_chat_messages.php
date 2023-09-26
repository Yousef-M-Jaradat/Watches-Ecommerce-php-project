<?php
include('connection.php'); // Include your database connection file

$query = "SELECT * FROM chat_messages ORDER BY timestamp";
$stmt = $pdo->prepare($query);
$stmt->execute();
$chatMessages = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($chatMessages);
?>
