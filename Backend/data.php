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

        while ($row = $results->fetch_assoc()) {

            echo "<li>
               
                Model: " . htmlspecialchars($row['model']) . "<br>
                Cijena: " . htmlspecialchars($row['price']) . "<br>
                Kolicina: " . htmlspecialchars($row['quantity']) . "<br>
                <button value='". $row['id'] ."' id='itemId' onclick='addToCart()'>Dodaj</button>
        </li>";
        }
    }else {
        echo "Search phrase not found.";
    }

}

if (isset($_GET['category'])){
    $category = $_GET['category'];

    $sql = "SELECT * FROM products p JOIN category c
            ON p.category_id = c.id WHERE c.name LIKE ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $category);

    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0){
        echo "<table><tr><td>Naziv</td><td>Kategorija</td><td>Cijena</td></tr>";
        while ($row = $results->fetch_assoc()) {
                echo "<tr><td>". $row['model'] ."</td><td>". $row['name'] ."</td><td>". $row['price'] ."€</td></tr>";
        }
    }else {
        echo "Search phrase not found.";
    }
}


?>