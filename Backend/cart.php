<?php

session_start();
include 'connection.php';
$userId = $_SESSION['id'];
$query = "SELECT * FROM products p JOIN cart c ON p.id = c.product_id WHERE c.user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){

    echo $row['model'];

}
?>



