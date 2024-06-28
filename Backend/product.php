<?php
include "connection.php";

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$model = $price = $quantity = "";
while ($row = $result->fetch_assoc()) {
    $model = $row["model"];
    $price = $row["price"];
    $quantity = $row["quantity"];
}

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
<div class="product">
    <h1><?php echo $model?></h1>
    <h2><?php echo $price?></h2>
    <h3><?php echo $quantity?></h3>
    <h4><?php echo $id?></h4>
    <button onclick="addProductToCart(<?php echo $id?>)">Buy</button>
</div>
<div id="greksa">

</div>
<script src="../Frontend/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>

