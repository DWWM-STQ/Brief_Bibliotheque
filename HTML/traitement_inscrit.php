<?php 
session_start();

$_SESSION['erreur'] ='';
$_SESSION['login'] ='';
$_SESSION['id'] ='';
$_SESSION['roles']='';
require '../CRUD/security.php';
if (isset($_POST['login']) && ($_POST['login'] != null) && !empty($_POST['login']) && (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL))){
    $login = $_POST['login'];
    $_SESSION["invalid_mail"] = NULL;
} else {
    $_SESSION['erreur'] .= 'Veuillez entrez une adresse mail valide';
    $_SESSION["invalid_mail"] = "error";
    header('Location: ./inscription.php');
    exit();
}

if (isset($_POST['password']) && ($_POST['password'] != null)){
    if($_POST['password'] == $_POST['repeatPassword']){
        if(preg_match('`[^0-9a-zA-Z]+$`',$_POST['password'])){
            $mdp = $_POST['password'];
            $_SESSION["invalid_password"] = "";
        } else {
            $_SESSION['erreur'] .= 'Le mot de passe doit contenir au moins une lettre et un caractère spécial.';
            $_SESSION["invalid_password"] = "error";
            header('Location: ./inscription.php');
            exit();
        }
        
    } else {
        $_SESSION['erreur'] .= "Vous n'avez pas tapé le même mot de passe.";
        $_SESSION["invalid_password"] = "error";
        header('Location: ./inscription.php');
        exit();
    }
    
} else {
    $_SESSION['erreur'] .= 'Le mot de passe est obligatoire.';
    $_SESSION["invalid_password"] = "error";
    header('Location: ./inscription.php');
    exit();
}



require_once '../CRUD/config.php';

$login = protect_montexte($login);
$mdp = protect_montexte($mdp);

$sql = "SELECT * FROM users";

//! bloc de protection pour ne pas pouvoir créer un compte sur une adresse mail déjà existante
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            if(($login == $row['login'])){
                $_SESSION['erreur'] .= 'Cette adresse mail possède déjà un compte.';
                $_SESSION["invalid_mail"] = "error";
                header('Location: ./inscription.php');
                exit();
            }
        }
    }
}

$pass = password_hash($mdp, PASSWORD_DEFAULT);

$sql = 'INSERT INTO users (login, mdp, roles, isVerified) VALUES (?,?,?,?)';
$sql2 = 'INSERT INTO clients (nom, prenom, telephone, adresse, complement, cp, ville, user_id) VALUES (?,?,?,?,?,?,?,?) ';
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "sssi", $param_login, $param_mdp, $param_role, $param_verif);
    $_SESSION['login'] = $login;
    $_SESSION['id'] = $row['id'];
    $param_login = $login;
    $param_mdp = $pass;
    $param_role = "user";
    $param_verif = false;
    if(mysqli_stmt_execute($stmt)){
        $stmt2 = mysqli_prepare($conn, $sql2);
    
        mysqli_stmt_bind_param($stmt2 ,"sssssssi", $param_nom, $param_prenom, $param_telephone, $param_adresse, $param_complement, $param_cp, $param_ville, $param_userid);
        $param_nom = protect_montexte($_POST['name']);
        $param_prenom = protect_montexte($_POST['last_name']);
        $param_telephone = protect_montexte($_POST['telephone']);
        $param_adresse = protect_montexte($_POST['adress']);
        $param_complement = protect_montexte($_POST['adresse_comp']);
        $param_cp = protect_montexte($_POST['postal']);
        $param_ville = protect_montexte($_POST['town']);
        
        
        if($result = mysqli_query($conn, "SELECT id FROM users WHERE login = '$login'")){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $param_userid = $row['id'];
                }
            }else{
                $_SESSION['erreur'] .= 'Une erreur est survenue lors de la création de votre compte';
                header('Location: ./inscription.php');
                exit();
            }
        }
        if(mysqli_stmt_execute($stmt2)){
            header('Location: ./profil.php');
        }
        else {
            echo "erreur de création client";
        }
    }  
}  



?> 