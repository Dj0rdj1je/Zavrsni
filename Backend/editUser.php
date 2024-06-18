<?php
session_start();
include 'connection.php';

$sql = "UPDATE user SET username = ? , password = ? , email = ?  WHERE id = ?";
$statement = $con->prepare($sql);
$statement->bind_param('sssi', $_POST['username'],$_POST['password'], $_POST['email'], $_SESSION['id']);
$statement->execute();


?>