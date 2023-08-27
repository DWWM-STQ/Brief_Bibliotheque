<?php
session_start();
$_SESSION['page'] = "Gestion des admins";
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
        <h2 class="mb-5 mt-3">Gestion des admins</h2>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Comptes utilisateurs</h3>
                    </div>
                    <div class="table-responsive">
                    <?php
                    require '../CRUD/config.php';
                        $sql = "SELECT * FROM users";
                    
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result)>0){
                                echo '<table class="table align-items-center table-flush">';
                                
                                
                                    echo '<thead class="thead-light">';
                                        echo '<tr>';
                                            echo '<th scope="col">ID</th>';
                                            echo '<th scope="col">Login</th>';
                                            echo '<th scope="col">Role</th>';
                                            echo '<th scope="col">Compte vérifié</th>';
                                            echo '<th scope="col">Modifier</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_array($result)){
                                        echo '<tr>';
                                            echo '<td scope="row">'. $row['id'] . '</td>';
                                            echo '<td scope="row">'. $row['login'] . '</td>';
                                            echo '<td scope="row">'. $row['roles'] . '</td>';
                                            echo '<td scope="row">'. $row['isVerified'] . '</td>';
                                            echo '<td scope="row">';
                                                echo '<a href="./update_user.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip"><span class="fas fa-pencil-alt"></span> </a>';
                                                echo '<a href="./delete_user.php?id='.$row['id'].'" class="mr-3" title="delete" data-toggle="tooltip"><span class="fas fa-trash-alt"></span> </a>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                echo '</table>';
                                
                                    
                            } else {
                                echo '<div class="alert alert-danger"><em>Aucun utilisateur enregistré.</em></div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger"><em>La connexion à la base de données à échouée. Veuillez vérifier que vous êtes bien connecté.</em></div>';
                        }
                        mysqli_close($conn);
                    ?>
                </div>
</body>
</html>