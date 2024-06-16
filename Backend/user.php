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
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" value="<?php echo $user['id']?>" id="id">
    <input type='text' value='<?php echo $user['username']?>' id='username'/>
    <input type='email' value='<?php echo $user['email']?>' id='email' />
    <input type='text' value='<?php echo $user['password']?>' id='password' />
    <input type="submit" value="Sacuvaj promjene" onclick="edit()">
</form>
<script src="../Frontend/app.js"></script>
</body>
</html>
