<?php 
session_start();
$_SESSION['page'] = "profil - vos livres";
$id = $_SESSION['id'];  
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
<div class="container mt-7">
        <h2 class="mb-5 mt-3">Vos livres</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Livres empruntés</h3>
                    </div>
                    <div class="table-responsive">
                    <?php
                    require_once '../CRUD/config.php';
                        $sql = "SELECT * FROM emprunts WHERE client_id = '$id' AND date_retour IS NULL";
                    
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                    echo '<thead class="thead-light">';
                                        echo '<tr>';
                                            echo '<th scope="col">Titre</th>';
                                            echo '<th scope="col">Couverture</th>';
                                            echo '<th scope="col">Date de l\'emprunt</th>';
                                            echo '<th scope="col">Date de retour maximale</th>';
                                            echo '<th scope="col">Rendre le livre</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_array($result)){
                                        if($row['date_retour'] == NULL){
                                            echo '<tr>';
                                            echo '<td scope="row">'. $row['titre_livre'] . '</td>';
                                            echo '<td scope="row"><img class="book_img_admin" src=".'.$row['image'].'" alt='.$row['image'].'></td>';
                                            echo '<td scope="row">'. $row['date_emprunt'] . '</td>';
                                            echo '<td scope="row">'. $row['date_retour_attendu'] . '</td>';
                                            echo '<td scope="row">';
                                                echo '<button class="btn btn-primary"><a class="a_link" href="./rendre_book.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip">Rendre</a></button>';
                                            echo '</td>';
                                        echo '</tr>';
                                        }
                                        
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun emprunt en cours.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        
                    ?>
                    
                </div>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Livres rendus</h3>
                    </div>
                    <div class="table-responsive">
                    <?php
                        $sql2 = "SELECT * FROM emprunts WHERE client_id = '$id' AND date_retour IS NOT NULL";
                    
                        if($result2 = mysqli_query($conn, $sql2)){
                            if(mysqli_num_rows($result2)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                echo '<thead class="thead-light">';
                                echo '<tr>';
                                echo '<th scope="col">Titre</th>';
                                echo '<th scope="col">Couverture</th>';
                                echo '<th scope="col">Date de l\'emprunt</th>';
                                echo '<th scope="col">Date du retour</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                
                                while ($rows = mysqli_fetch_array($result2)){

                                        echo '<tr>';
                                            echo '<td scope="row">'. $rows['titre_livre'] . '</td>';
                                            echo '<td scope="row"><img class="book_img_admin" src=".'.$rows['image'].'" alt='.$rows['image'].'></td>';
                                            echo '<td scope="row">'. $rows['date_emprunt'] . '</td>';
                                            echo '<td scope="row">'. $rows['date_retour'] . '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun livre rendu.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        
                    ?>
                    
                </div>
                <?php mysqli_close($conn); ?>
</body>
</html>