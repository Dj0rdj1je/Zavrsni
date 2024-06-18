<?php

session_start();
include 'connection.php';
$userId = $_SESSION['id'];
$query = "SELECT * FROM products p JOIN cart c ON p.id = c.product_id WHERE c.user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr><td>Model</td><td>Price</td></tr>
    <?php
    $price = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo "<tr><input id='artikalId' type='hidden' value='".$row['product_id']."'><td>".$row['model']."</td><td>".$row['price']."</td> <td><button onclick='removeFromCart()'>GG</button></td></td>";
            $price += $row['price'];
        }
    }
    echo "<tr><td>Price</td><td id='price'>" . $price . "</td></tr>";
    ?>

</table>
<button>Buy</button>
<script src="../Frontend/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>



