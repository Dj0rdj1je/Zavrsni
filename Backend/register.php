<?php

    session_start();
    include 'connection.php';
$username = $password = $email = "";
$usernameErr = $passErr = $emailErr = $regError = "";
$check = true;

if (isset($_POST['submit'])) {

    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $usernameErr = "Morate unijeti korisnicko ime!";
        $check = false;
    }

    if (strlen($_POST['password']) >= 4) {
        $password = $_POST['password'];
    } else {
        $passErr = "Lozinka je prekratka";
        $check = false;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $email = $_POST['email'];
    }else {
        $emailErr = "Morate unijeti korektat e-mail!";
        $check = false;
    }

    if($check){

        $checkSql = "SELECT * FROM user WHERE username = '$username'";
        $execute = $con->query($checkSql);

        if ($execute->num_rows > 0) {
            echo "<script>alert('Korisnik sa tim imenom vec postoji!')</script>";
        } else {

            $sql = "INSERT INTO user (username, password,email) values (?, ?, ?) ;";

            $stmt = $con->prepare($sql);
            $stmt->bind_param('sss', $username, $password, $email);

            if ($stmt->execute()){
                header('location:index.php');
            }else{
                die('Neuspjeno konektovanje'. $con->error);
            }

        }

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
    <title>Sign in</title>
</head>
<body>
<div class="card">
    <h2>Registration Form</h2>

    <div class="login_register">
        <a href="login.php" class="login" >Login</a>
        <a href="register.php" class="register" >Signup</a>
    </div>

    <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="text" placeholder="Username" class="username" name="username">
        <input type="email" placeholder="Email Address" class="email" name="email">
        <input type="password" placeholder="password" class="pass" name="password">
        <input type="submit" value="Sign in" name="submit">
    </form>




</div>
</body>
</html>