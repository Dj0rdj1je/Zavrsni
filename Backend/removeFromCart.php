<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['username'])){
    header('location:login.php');
}
if (isset($_POST['removeId'], $_POST['productId'])) {

$id = $_POST['removeId'];
$productId = $_POST['productId'];
$amount = 1;

$query = "DELETE FROM cart WHERE id= ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

$query = "UPDATE products SET quantity = quantity + ? WHERE id= ?";
$stmt = $con->prepare($query);
$stmt->bind_param('ii', $amount, $productId);
$stmt->execute();

}
?>