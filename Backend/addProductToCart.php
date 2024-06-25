<?php
session_start();
include "connection.php";
$id = $_POST['productId'];
$user = $_SESSION['id'];
var_dump($user);
$query = "INSERT INTO cart (user_id, product_id) VALUES (?,?)";

$stmt = $con->prepare($query);
$stmt->bind_param('ii',$user, $id);
$stmt->execute();

?>


