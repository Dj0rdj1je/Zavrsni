<?php
session_start();
include("connection.php");

$id = $_SESSION["id"];
$sum = $_POST["sum"];
$sql = "SELECT p.model, p.price FROM cart c JOIN products p on c.product_id = p.id WHERE user_id= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {

    $model[] = $row["model"];
    $price[] = $row["price"];

}
    $filename =   "Cart-" . date("Y-m-d") . ".csv";

    $file = fopen($filename, "w");
    fputcsv($file, ["Modeli: ",implode(',', $model)]);
    fputcsv($file, ["Cijena: ", implode(',', $price)]);
    fputcsv($file, ["Ukupno: ", $sum]);
    fclose($file);

    echo "Uspjesno ste napravili fajl: " . $filename;

?>