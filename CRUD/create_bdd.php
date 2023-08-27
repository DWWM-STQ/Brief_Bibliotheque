<?php
require './first_connexion.php';
$sql = "CREATE DATABASE if not exists BibliotheKa";

if(!mysqli_query($conn, $sql)){
    echo "Impossible de créer la base de données. Veuillez réessayer";
}else{
    echo 'La BDD a été créee';
}
echo '<hr>';
mysqli_close($conn);
?>