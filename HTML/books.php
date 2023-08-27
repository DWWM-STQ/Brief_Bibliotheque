<?php 
session_start();
$_SESSION['page'] = "Nos livres";
if ((isset($_SESSION['id'])) && (!empty($_SESSION['id'])) && (isset($_SESSION['login'])) && (!empty($_SESSION['login']))){
    $id = $_SESSION['id'];
    $login = $_SESSION['login'];
}else {
    $id = "";
    $login ="";
}

$nom ='';
$prenom ='';
$user_id ='';
require_once '../COMPONENTS/navbar.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../COMPONENTS/links.php'; ?>
    <title>BibliotheKa | <?= $_SESSION['page'] ?></title>
</head>

<body>
<div class="container">
        <h1 class="jumbotron-heading">Notre BibliotéKa</h1>
            <p class="lead text-muted">Vous trouverez ici une large sélection de livres, que vous pouvez emprunter ou acheter.</p>
            <p>Veuillez consulter les <span><a href="./cgu.php">conditions générales d'utilisation</a></span> avant d'emprunter.</p>
        </div>
<!-- FIN  -->
<div class="album py-5 bg-primary">
        <div class="container">
            <div class="row">
<?php
                        include_once './get_books.php';
                        include_once './get_user.php';
                        get_user();
                        get_books($nom, $prenom, $user_id, $login);              

?>
        </div>
        </div>
                
                
                    


       
</body>
</html>

