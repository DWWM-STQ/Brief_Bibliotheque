<?php
session_start();
require '../CRUD/config.php';
require '../CRUD/security.php';

if(isset($_GET['id'])){
    $id = $_SESSION['id'];
    
    $sql = "UPDATE clients SET nom=?, prenom=?, telephone=?, adresse=?, complement=?, cp=?, ville=? WHERE clients.id=$id";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "sssssss", $param_nom, $param_prenom, $param_telephone, $param_adresse, $param_complement, $param_cp, $param_ville);
        $param_nom = protect_montexte($_POST['name']);
        $param_prenom = protect_montexte($_POST['last_name']);
        $param_telephone = protect_montexte($_POST['telephone']);
        $param_adresse = protect_montexte($_POST['adress']);
        $param_complement = protect_montexte($_POST['adresse_comp']);
        $param_cp =protect_montexte($_POST['postal']);
        $param_ville = protect_montexte($_POST['ville']);
            
        
            
        if (mysqli_stmt_execute($stmt)){
            $_SESSION['message'] = "modification validée.";
            header("Location: ./profil.php");
            exit();
        } else {
            $_SESSION['erreur'] = "Une erreur est survenue";
            header("Location: ./profil.php");
            exit();
        }
    }else{
        $_SESSION['erreur'] = "Une erreur est survenue";
        header("Location: ./profil.php");
        exit();
    }
    
    mysqli_close($conn);
}

?>