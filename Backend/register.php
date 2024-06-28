<?php

    session_start();
    include 'connection.php';

$username = $password = $email = "";
$usernameErr = $passErr = $emailErr = $regError = "";
$check = true;
$role = 2;
if (isset($_POST['submit'])) {

    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $usernameErr = "Morate unijeti korisnicko ime!";
        $check = false;
    }

    if (strlen($_POST['password']) >= 7) {
        $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);

    } else {
        $passErr = "Lozinka je prekratka";
        $check = false;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $email = $_POST['email'];
    }else {
        $emailErr = "Morate unijeti korektan e-mail!";
        $check = false;
    }

    if($check){

        $checkSql = "SELECT * FROM user WHERE username = ?";
        $stmt = $con->prepare($checkSql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        if ($results->num_rows > 0) {
            echo "<script>alert('Korisnik sa tim imenom vec postoji!')</script>";
        } else {

            $sql = "INSERT INTO user (username, password,email,role_id) values (?, ?, ?, ?) ;";

            $stmt = $con->prepare($sql);
            $stmt->bind_param('sssi', $username, $password, $email, $role);
            if ($stmt->execute()){

                $checkSql = "SELECT * FROM user WHERE username = ?";
                $stmt = $con->prepare($checkSql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $results = $stmt->get_result();
                while ($row = $results->fetch_assoc()) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $username;
                    $_SESSION['role_id'] = $role;

                }
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
    <link rel="stylesheet" href="../Frontend/styles.css">

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
        <input type="text" placeholder="Username" class="username" name="username" id="username" onkeyup="checkUsername()" required>
        <span id="usernameError"></span>
        <input type="email" placeholder="Email Address" class="email" name="email" id="email" onkeyup="checkEmail()" required>
        <span id="emailError"></span>
        <input type="password" placeholder="password" class="pass" name="password" id="password" onkeyup="checkPassword()" required>
        <span id="passwordError"></span>
        <input id="register" type="submit" value="Sign in" name="submit">
    </form>



</div>
<script src="../Frontend/validation.js"></script>
</body>
</html>