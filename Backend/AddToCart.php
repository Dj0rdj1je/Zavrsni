<?php
session_start();
include 'connection.php';
$itemId = $_POST['itemId'];
$userId = $_SESSION['id'];
$query = "Insert into cart (user_id, product_id) values (?,?)";
$stmt = $con->prepare($query);
$stmt->bind_param("ii", $userId, $itemId);
$stmt->execute();

?>