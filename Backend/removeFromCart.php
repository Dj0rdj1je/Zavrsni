<?php
include 'connection.php';
$id = $_POST['removeId'];

$query = "DELETE FROM cart WHERE id= ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();


?>