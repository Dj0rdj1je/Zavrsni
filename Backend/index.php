<?php
session_start();
include 'connection.php';
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <a href="add.php">Dodaj artikal</a>
            <a href="user.php?id=<?php echo $_SESSION['id']; ?>">User</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" id="search" name="search" onkeyup="find()">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </div>

</nav>
<ul id="lista">

</ul>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>