<?php
session_start();
$_SESSION['page'] = "Gestion des emprunts";
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
<div class="container mt-7">
        <h2 class="mb-5 mt-3">Gestion des emprunts</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Emprunts</h3>
                        <!-- <a href="./create_client.php" class="btn btn-warning m-2 float-end">Inscrire un client</a> -->
                    </div>
                    <div class="table-responsive">
                    <?php
                    require '../CRUD/config.php';
                        $sql = "SELECT * FROM emprunts";
                    
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                    echo '<thead class="thead-light">';
                                        echo '<tr>';
                                            echo '<th scope="col">ID</th>';
                                            echo '<th scope="col">Titre du livre</th>';
                                            echo '<th scope="col">Date de l\'emprunt</th>';
                                            echo '<th scope="col">Date de retour attendue</th>';
                                            echo '<th scope="col">Date de retour</th>';
                                            echo '<th scope="col">ID du client</th>';
                                            echo '<th scope="col">Nom du client</th>';
                                            echo '<th scope="col">Prénom du client</th>';
                                            echo '<th scope="col">Email du client</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                            echo '<td scope="row">'. $row['id'] . '</td>';
                                            echo '<td scope="row">'. $row['titre_livre'] . '</td>';
                                            echo '<td scope="row">'. $row['date_emprunt'] . '</td>';
                                            echo '<td scope="row">'. $row['date_retour_attendu'] . '</td>';
                                            echo '<td scope="row">'. $row['date_retour'] . '</td>';
                                            echo '<td scope="row">'. $row['client_id'] . '</td>';
                                            echo '<td scope="row">'. $row['nom'] . '</td>';
                                            echo '<td scope="row">'. $row['prenom'] . '</td>';
                                            echo '<td scope="row">'. $row['login'] . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun emprunt enregistré.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        mysqli_close($conn);
                    ?>
                </div>
</body>
</html>