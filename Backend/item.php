<?php

session_start();

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
        <a class="navbar-brand" href="index.php">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if ($_SESSION['username'] == 'admin'){
                        echo "<a class='nav-link active' aria-current='page' href='item.php'>Dodaj artikal</a>";
                    }?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php?id=<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['username']?></a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" id="search" name="search" onkeyup="find()">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<form action="" method="post">
    <span>Model</span>
    <input type="text" id="model" >
    <br>
    <span>Cijena</span>
    <input type="number" id="price" >
    <br>
    <span>Kolicina</span>
    <input type="number" id="quantity" >
    <br>
    <select id="categoryId">
        <?php
        include 'connection.php';
        $query = "SELECT * FROM category";
        $execute = $con->query($query);
        if ($execute->num_rows >0){
            while ($row = $execute->fetch_assoc()){
                echo "<option value ='".$row['id']."' >".$row['name']."</option>";
            }
        }
        ?>
    </select>
    <input type="submit" value="Add" id="submit" onclick="addItem()">

</form>
<script src="../Frontend/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
