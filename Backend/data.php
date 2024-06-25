<?php
session_start();
include "connection.php";

if (isset($_GET['search_phrase'])) {
    $search = $_GET['search_phrase']."%";

    $sql = "SELECT * FROM products WHERE model LIKE ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $search);

    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0){
        echo "<table><tr><td>Ime</td><td>model</td><td>cijenu</td></tr>";
        while ($row = $results->fetch_assoc()) {

            $id = $row['id'];
            $model = $row["model"];
            $price = $row["price"];

            echo "<tr><td>$id</td><td>$model</td><td>$price</td>";



        }
        echo "</table>";
    }else {
        echo "Search phrase not found.";
    }

}

if (isset($_GET['category'])){
    $category = $_GET['category'];

    $sql = "SELECT model, price, p.id FROM products p JOIN category c
            ON p.category_id = c.id WHERE c.name LIKE ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $category);

    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0){
        while ($row = $results->fetch_assoc()) {
                echo "<a href='product.php?id=". $row['id'] . "'><tr><td>". $row['model'] ."</td><td>". $row['price'] ."€</td></tr></a>";
        }
    }else {
        echo "Search phrase not found.";
    }
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
<script src="../Frontend/add.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
