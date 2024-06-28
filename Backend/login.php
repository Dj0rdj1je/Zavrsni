<?php

session_start();
include 'connection.php';
$err = '';
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username LIKE ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $results = $stmt->get_result();

    if ($results->num_rows > 0){
        while ($row = $results->fetch_assoc()){
            if (password_verify($password, $row['password'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = $row['role_id'];
                header('Location: index.php');
            }else{
                $err = "<span>Pogresna sifra</span>";
            }
        }
    }else{
        $err = "<span>Korisnik ne postoji</span>";
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
    <link rel="stylesheet" href="../Frontend/styles.css">
    <title>Login</title>
</head>
<body>
<div class="card">
    <h2>Login Form</h2>


    <div class="login_register" >
        <a id="login" href="login.php" class="login" >Login</a>
        <a id="register" href="register.php" class="register" >Signup</a>
    </div>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form" method="POST" >
        <?php echo $err?>
        <input type="text" placeholder="Username" id="username" name="username"/>
        <input type="password" placeholder="password" id="pass" name="password"/>
        <input type="submit" class="login_btn" name="submit" value="Login"/>
    </form>


</div>
</body>
</html>