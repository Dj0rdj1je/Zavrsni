<?php
session_start();
include "connection.php";
if (!isset($_SESSION['username'])){
    header('location:login.php');
}

if (isset($_POST['productId'])){
    $id = $_POST['productId'];
    $user = $_SESSION['id'];
    $amount = 1;

$query = "SELECT quantity FROM products WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i',$id);
$stmt->execute();
$result = $stmt->get_result();
$quantity = $result->fetch_assoc();

if($quantity > 0){

    $query = "INSERT INTO cart (user_id, product_id) VALUES (?,?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ii',$user, $id);
    $stmt->execute();


    $query = "UPDATE products SET quantity = quantity - ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ii',$amount,$id);
    $stmt->execute();

}else{
    echo "Nema vise dostupnih zaliha!";
}

}else{
    header('location:index.php');
}

?>


