<?php

//PhpMyAdmin
$host="localhost";
$user ="root";
$pass="";
$db="BibliotheKa";

$conn = mysqli_connect($host, $user, $pass, $db);


if(!$conn){
    die("Connexion erreur :" . mysqli_connect_error());
}


?>