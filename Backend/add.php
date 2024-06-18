<?php
session_start();
include 'connection.php';

$model = $_POST['model'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$categoryId = $_POST['categoryId'];
$query = "INSERT INTO products (model, price, quantity, category_id) VALUES (?,?,?,?)";

$stmt = $con->prepare($query);
$stmt->bind_param('sssi', $model, $price, $quantity, $categoryId);
$stmt->execute();

?>

