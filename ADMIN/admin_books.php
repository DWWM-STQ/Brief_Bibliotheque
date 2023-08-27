<?php
session_start();
$_SESSION['page'] = "Gestion des livres";
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
        <h2 class="mb-5 mt-3">Gestion des livres</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Livres disponibles</h3>
                        <a href="./create_book.php" class="btn btn-warning m-2 float-end">Ajouter un livre</a>
                    </div>
                    <div class="table-responsive">
                    <?php
                    require '../CRUD/config.php';
                        $sql = "SELECT * FROM books";
                    
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                    echo '<thead class="thead-light">';
                                        echo '<tr>';
                                            echo '<th scope="col">ID</th>';
                                            echo '<th scope="col">Couverture</th>';
                                            echo '<th scope="col">Titre</th>';
                                            echo '<th scope="col">Auteur</th>';
                                            echo '<th scope="col">Illustrateur</th>';
                                            echo '<th scope="col">Catégorie</th>';
                                            echo '<th scope="col">Description</th>';
                                            echo '<th scope="col">ISBN</th>';
                                            echo '<th scope="col">Pages</th>';
                                            echo '<th scope="col">Éditeur</th>';
                                            echo '<th scope="col">Prix</th>';
                                            echo '<th scope="col">Stock</th>';
                                            echo '<th scope="col">Note</th>';
                                            echo '<th scope="col">Modifier</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                            echo '<td scope="row">'. $row['id'] . '</td>';
                                            echo '<td scope="row"><img class="book_img_admin" src=".'.$row['image'].'" alt='.$row['image'].'></td>';
                                            echo '<td scope="row">'. $row['titre'] . '</td>';
                                            echo '<td scope="row">'. $row['auteur'] . '</td>';
                                            echo '<td scope="row">'. $row['illustrateur'] . '</td>';
                                            echo '<td scope="row">'. $row['category'] . '</td>';
                                            echo '<td scope="row" ><p class="desc">'. $row['description'] . '</p></td>';
                                            echo '<td scope="row">'. $row['ISBN'] . '</td>';
                                            echo '<td scope="row">'. $row['nb_pages'] . '</td>';
                                            echo '<td scope="row">'. $row['editeur'] . '</td>';
                                            echo '<td scope="row">'. round(($row['pu_ht'] * $row['tva']/100) + $row['pu_ht'], 2)  . '</td>';
                                            echo '<td scope="row">'. $row['stock'] . '</td>';
                                            echo '<td scope="row">'. $row['note'] . '</td>';
                                            echo '<td scope="row">';
                                                echo '<a href="./update_book.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip"><span class="fas fa-pencil-alt"></span> </a>';
                                                echo '<a href="./delete_book.php?id='.$row['id'].'" class="mr-3" title="delete" data-toggle="tooltip"><span class="fas fa-trash-alt"></span> </a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun livre enregistré.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        mysqli_close($conn);
                    ?>
                </div>
    
</body>
</html>
