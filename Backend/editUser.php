<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['username'])){
    header("location:login.php");
}
if (isset($_POST['username'], $_POST['password'], $_POST['email'])) {
$id = $_SESSION['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$sql = "UPDATE user SET username = ? , password = ? , email = ?  WHERE id = ?";
$statement = $con->prepare($sql);
$statement->bind_param('sssi', $username,$password, $email, $id);
$statement->execute();
echo "Uspjesno ste izmijenili licne podatke!";
}
?>