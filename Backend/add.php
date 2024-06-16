<?php



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
<form action="" method="post">
    <span>Naziv filma</span>
    <input type="text" id="title" >
    <br>
    <span>Zanr</span>
    <input type="text" id="genre" >
    <br>
    <select id="director">

    </select>
    <input type="submit" value="Add" id="submit" onclick="addMovie()">
</form>
</body>
</html>
