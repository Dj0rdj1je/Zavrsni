<?php
$location = "localhost";
$name = "root";
$pass = "";
$database = "zavrsni";

$con = new mysqli($location, $name, $pass, $database);

if(!$con -> connect_error){
    return true;
}else{
    die("Greska pri konekciji". $con->connect_error );
}




?>



