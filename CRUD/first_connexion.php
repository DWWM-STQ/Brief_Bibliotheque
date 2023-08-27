<?php

//PhpMyAdmin
$host="localhost";
$user ="root";
$pass="";

$conn = mysqli_connect($host, $user, $pass);


if(!$conn){
    die("Connexion erreur :" . mysqli_connect_error());
}


?>