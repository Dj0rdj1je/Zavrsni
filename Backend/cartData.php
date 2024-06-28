<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['id'])) {
    header("location:login.php");
}
$userId = $_SESSION['id'];
$query = 'SELECT p.id AS product_id, c.id, p.model, p.price, p.quantity  FROM products p JOIN cart c ON p.id = c.product_id WHERE c.user_id = ?';
$stmt = $con->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

  echo '<table> <tr><td>Model</td><td>Price</td></tr>';
        $id = '';
        $sum = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $productId = $row['product_id'];
                $model = $row["model"];
                $price = $row["price"];
                $sum += $row['price'];
                echo '<tr><td>'.$model.'</td><td>'.$price.'</td><td><input type="button" onclick="removeProduct('. $id .','. $productId .')" value="Delete"></td></tr>';
            }

        }

        echo '<tr><td>Price</td><td id="price">' . $sum . '</td></tr></table>';
        echo '<tr><td><input type="button" onclick="buyProduct('. $sum .' )" value="Buy"></td></tr>';
        ?>



