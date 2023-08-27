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
    header('Location: ./connexion.php');
    exit();
}

if (isset($_POST['password']) && ($_POST['password'] != null)){
    
    if(preg_match('`[^0-9a-zA-Z]`',$_POST['password'])){
        $mdp = $_POST['password'];
        $_SESSION["invalid_password"] = "";
    } else {
        $_SESSION['erreur'] .= 'Le mot de passe doit contenir au moins une lettre et un caractère spécial.';
        $_SESSION["invalid_password"] = "error";
        header('Location: ./connexion.php');
        exit();
    }
        
    
    
} else {
    $_SESSION['erreur'] .= 'Le mot de passe est obligatoire.';
    $_SESSION["invalid_password"] = "error";
    header('Location: ./connexion.php');
    exit();
}



require_once '../CRUD/config.php';

$login = protect_montexte($login);
$mdp = protect_montexte($mdp);

$sql = "SELECT * FROM users";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            if(($login == $row['login']) && ($mdp == password_verify($mdp, $row['mdp']))){
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $row['id'];
                $_SESSION['roles'] = $row['roles'];

                $valide = "ok";
                header('Location: ./profil.php');
                exit();
            } else {
                $valide = '';
            }
        }
        if($valide !="ok"){
            $_SESSION['erreur'] = "L'adresse mail ou le mot de passe est erroné";
            header('Location: ./connexion.php');
            exit();
        }
    }
} else {
    $_SESSION['erreur'] = "Une erreur est survenue. Veuillez réessayer plus tard.";
    header('Location: ./connexion.php');
    exit();
}