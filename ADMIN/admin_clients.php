<?php
session_start();
$_SESSION['page'] = "Gestion des clients";
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
        <h2 class="mb-5 mt-3">Gestion des clients</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Clients inscrits</h3>
                        <!-- <a href="./create_client.php" class="btn btn-warning m-2 float-end">Inscrire un client</a> -->
                    </div>
                    <div class="table-responsive">
                    <?php
                    require '../CRUD/config.php';
                        $sql = "SELECT * FROM clients";
                    
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                    echo '<thead class="thead-light">';
                                        echo '<tr>';
                                            echo '<th scope="col">ID</th>';
                                            echo '<th scope="col">Nom</th>';
                                            echo '<th scope="col">Prénom</th>';
                                            echo '<th scope="col">Téléphone</th>';
                                            echo '<th scope="col">Adresse</th>';
                                            echo '<th scope="col">Complément</th>';
                                            echo '<th scope="col">Code Postal</th>';
                                            echo '<th scope="col">Ville</th>';
                                            echo '<th scope="col">user_id</th>';
                                            echo '<th scope="col">Modifier</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                            echo '<td scope="row">'. $row['id'] . '</td>';
                                            echo '<td scope="row">'. $row['nom'] . '</td>';
                                            echo '<td scope="row">'. $row['prenom'] . '</td>';
                                            echo '<td scope="row">'. $row['telephone'] . '</td>';
                                            echo '<td scope="row">'. $row['adresse'] . '</td>';
                                            echo '<td scope="row">'. $row['complement'] . '</td>';
                                            echo '<td scope="row">'. $row['cp'] . '</td>';
                                            echo '<td scope="row">'. $row['ville'] . '</td>';
                                            echo '<td scope="row">'. $row['user_id'] . '</td>';
                                            echo '<td scope="row">';
                                                echo '<a href="./update_client.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip"><span class="fas fa-pencil-alt"></span> </a>';
                                                echo '<a href="./delete_client.php?id='.$row['id'].'" class="mr-3" title="delete" data-toggle="tooltip"><span class="fas fa-trash-alt"></span> </a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun client enregistré.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        mysqli_close($conn);
                    ?>
                </div>
</body>
</html>