<?php

session_start();
include "connection.php";
if (!isset($_SESSION['id'])) {

    header('Location: login.php');

}

$id = $_GET['id'];

if ($id == $_SESSION['id']) {

    $query = "SELECT * FROM user WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $id );
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

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
<!--<nav class="navbar navbar-expand-lg bg-body-tertiary">-->
<!--    <div class="container-fluid">-->
<!--        <a class="navbar-brand" href="index.php">Navbar</a>-->
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li class="nav-item">-->
<!--                    --><?php //if ($_SESSION['username'] == 'admin'){
//                        echo "<a class='nav-link active' aria-current='page' href='item.php'>Dodaj artikal</a>";
//                    }?>
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="user.php?id=--><?php //echo $_SESSION['id']; ?><!--">--><?php //echo $_SESSION['username']?><!--</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <form class="d-flex" role="search">-->
<!--                <input class="form-control me-2" id="search" name="search" onkeyup="find()">-->
<!--                <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

    <input type="hidden" value="<?php echo $user['id']?>" id="id">
    <input type='text' value='<?php echo $user['username']?>' id='username'/>
    <input type='email' value='<?php echo $user['email']?>' id='email' />
    <input type='text' value='<?php echo $user['password']?>' id='password' />
    <button  onclick="edit()">Sacuvaj</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../Frontend/app.js"></script>
</body>
</html>
