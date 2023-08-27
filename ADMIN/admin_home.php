<?php
session_start();
$_SESSION['page'] = "Accueil administrateur";
if ($_SESSION['roles'] != 'admin'){
    header('Location: ../HTML/home.php');
    exit();
}
require_once './COMPONENTS/navbar_admin.php';
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
        <h4 class="mt-4">Bonjour <?= $_SESSION['roles'] ?></h4>
        <p>Que souhaitez-vous faire ?</p>
        <div class="container">
            
            <div class="row">

                <div class="col-md-3 ">
                <a href="./admin_books.php">
                    <div class="card card_move mb-4 box-shadow">
                    <img src="../IMG/admin_livres.jpg" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; display: block;">
                        <div class="card-body">
                                <p class="card-text">Ajouter, modifier des livres</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                    </div>
                </a>
                </div>

                <div class="col-md-3">
                    <a href="./admin_clients.php">
                    <div class="card card_move mb-4 box-shadow">
                        <img src="../IMG/admin_clients.jpg" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; display: block;">
                            <div class="card-body">
                                <p class="card-text">Gérer les clients</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3">
                <a href="./admin_users.php">
                    <div class="card card_move mb-4 box-shadow">
                        <img src="../IMG/admin_admin.jpg" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; display: block;">
                            <div class="card-body">
                                <p class="card-text">Gérer les utilisateurs</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3">
                <a href="./admin_emprunts.php">
                    <div class="card card_move mb-4 box-shadow">
                        <img src="../IMG/admin_emprunts.jpg" class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; display: block;" >
                            <div class="card-body">
                                <p class="card-text">Consulter les emprunts</p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</body>
</html>