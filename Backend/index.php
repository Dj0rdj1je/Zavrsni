<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<?php
include 'navbar.php';
?>


<div onchange="choose()">
    <select id="category" >

        <?php

        $query = "SELECT * FROM category";
        $execute = $con->query($query);
        if ($execute-> num_rows > 0){

            while ($row = $execute->fetch_assoc()){

                echo "<option value='".$row['name']."' >". $row['name'] ."</option>";

            }

        }

        ?>
    </select>

</div>

<div id="table"></div>
<script src="../Frontend/app.js"></script>
<script src="../Frontend/validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>