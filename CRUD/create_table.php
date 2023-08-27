<?php 
require_once './config.php';

$table = "users";
$sql = "CREATE TABLE IF NOT EXISTS $table(
id int(10) unsigned auto_increment primary key,
login varchar(50) unique not null,
mdp varchar(150) not null,
roles varchar(15) not null,
isVerified bool null)";

if(mysqli_query($conn, $sql)){
    echo "Table : " . $table . " est créée";
} else {
    echo "Erreur de création" . mysqli_error($conn);
}

$table2 = "books";
$sql = "CREATE TABLE IF NOT EXISTS $table2(
id int(10) unsigned auto_increment primary key,
ISBN varchar(40) unique not null,
auteur varchar(150) null,
illustrateur varchar(150) null,
category varchar(255) not null,
nb_pages int(5) not null,
editeur varchar(255) not null,
pu_ht decimal(10,2) unsigned not null,
tva float(6) unsigned not null,
titre varchar(255) not null,
description text not null,
image varchar(255) not null,
stock int(10) not null,
note int(1) null)";

if(mysqli_query($conn, $sql)){
    echo "Table : " . $table2 . " est créée";
} else {
    echo "Erreur de création" . mysqli_error($conn);
}

$table3 = "clients";
$sql = "CREATE TABLE IF NOT EXISTS $table3(
id int(10) unsigned primary key auto_increment not null,
nom varchar(255) not null,
prenom varchar(255) not null,
telephone varchar(20) not null,
adresse varchar(255) not null,
complement varchar(255) not null,
cp varchar(50) not null,
ville varchar(255) not null,
user_id int(10) unsigned not null,
FOREIGN KEY (user_id) REFERENCES users (id))";

if(mysqli_query($conn, $sql)){
    echo "Table : " . $table3 . " est créée";
} else {
    echo "Erreur de création  dddd" . mysqli_error($conn);
}




$table4 = "mails";
$sql = "CREATE TABLE IF NOT EXISTS $table4(
    id int(10) unsigned NOT NULL auto_increment PRIMARY KEY,
    nom varchar(255) NOT NULL,
    prenom varchar(255) NOT NULL,
    mail varchar(255) NOT NULL,
    messages varchar(255) NOT NULL)";

if (mysqli_query($conn, $sql)){
    echo "Table : " . $table4 . " est créée";
}else {
    echo "Erreur de création" . mysqli_error($conn);
}

$table6 = "emprunts";
$sql = "CREATE TABLE IF NOT EXISTS $table6(
    id int(10) unsigned NOT NULL auto_increment PRIMARY KEY,
    titre_livre varchar(255) NOT NULL,
    image varchar(255) NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour_attendu DATE NOT NULL,
    date_retour DATE NULL,
    client_id int(10) unsigned NOT NULL,
    nom varchar(255) NOT NULL,
    prenom varchar(255) NOT NULL,
    login varchar(50) NOT NULL,
    FOREIGN KEY (client_id) REFERENCES users(id))";

if (mysqli_query($conn, $sql)){
    echo "Table : " . $table6 . " est créée";
}else {
    echo "Erreur de création" . mysqli_error($conn);
}



$token = "token users";
$sql = "ALTER TABLE users ADD COLUMN token_reset VARCHAR(255) NULL";
if(mysqli_query($conn, $sql)){
    echo "colomne: " . $token . " est créée";
} else {
    echo "Erreur de création" . mysqli_error($conn);
}

$conn -> close();

?>