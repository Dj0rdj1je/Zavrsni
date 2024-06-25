<?php

session_start();
include 'connection.php';
$userId = $_SESSION['id'];
$query = "SELECT c.id, p.model, p.price, p.quantity  FROM products p JOIN cart c ON p.id = c.product_id WHERE c.user_id = ?";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<form>
<table>
    <tr><td>Model</td><td>Price</td></tr>
    <?php
    $sum = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $model = $row["model"];
            $price = $row["price"];
            $sum += $row['price'];
            echo '<tr><td>'.$model.'</td><td>'.$price.'</td><td><input type="button" onclick="removeProduct('.$id.')" value="Delete"></td></tr>';
        }
    }
    echo "<tr><td>Price</td><td id='price'>" . $sum . "</td></tr>";
    ?>

</table>
</form>
<div id="err"></div>
<button>Buy</button>
<script src="../Frontend/app.js"></script>

</body>
</html>



