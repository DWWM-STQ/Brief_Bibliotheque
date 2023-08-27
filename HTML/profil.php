<?php 
session_start();
$_SESSION['page'] = "profil - votre profil";
if (isset($_SESSION['erreur'])){
    $erreur = $_SESSION['erreur'];
    unset($_SESSION['erreur']);
} else {
    $erreur ="";
}
$message ="";
if (isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message ="";
}
require '../CRUD/config.php';
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
    <main class="container">
        <div class="text-center card mt-3 col-sm-6 mx-auto col-centered">
        <h4 class="mb-3 mt-3">Votre profil</h4>
        <?php
        if (!empty($erreur) && $erreur != ""){
            echo '<div class="alert-danger"> <p>' . $erreur . '</p> </div>';
        }
        
        $sql = "SELECT * FROM users";

        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if(($_SESSION['login'] == $row['login'])){
                        $rowid = $row['id'];
                        $_SESSION['id'] = $row['id'];
                        $sql2 = "SELECT * FROM clients WHERE user_id = $rowid";
                        if($result = mysqli_query($conn, $sql2)){
                            if(mysqli_num_rows($result)>0){
                                

                                while ($row = mysqli_fetch_array($result)){
                                    echo "<form action='./modify_profil.php?id=".$rowid."' method='post'>";
                                    echo 
                                    "<div class='col-sm-6 mx-auto'>
                                    <label for='name' >Nom*</label>
                                    <input type='text' id='name' class='form-control' name='name' value='" . $row['nom'] ."' required autofocus maxlength='254'>
                                    </div>";

                                    echo
                                    "<div class='col-sm-6 mx-auto'>
                                    <label for='last_name' >Prénom*</label>
                                    <input type='text' id='last_name' class='form-control' name='last_name' value='" . $row['prenom'] ."' required maxlength='254'>
                                    </div>";

                                    echo
                                    "<div class='col-sm-6 mx-auto'>
                                    <label for='telephone' >Téléphone*</label>
                                    <input type='tel' id='telephone' class='form-control' name='telephone' value='" . $row['telephone'] ."' required  maxlength='19'>
                                    </div>";

                                    echo "<div class='col-sm-6 mx-auto'>
                                    <label for='adress' >Adresse*</label>
                                    <input type='text' id='adress' class='form-control' name='adress' value='" . $row['adresse'] ."' required maxlength='254'>
                                    </div>";
                                    
                                    echo "<div class='col-sm-6 mx-auto'>
                                    <label for='adresse_comp' >Complément d'adresse</label>
                                    <input type='text' id='adresse_comp' class='form-control' name='adresse_comp' value='" . $row['complement'] ."'  maxlength='254'>
                                    </div>";
                                    
                                    echo "<div class='col-sm-6 mx-auto'>
                                    <label for='postal' >Code postal</label>
                                    <input type='text' id='postal' class='form-control' name='postal' value='" . $row['cp'] ."' required  maxlength='50' pattern='[0-9]*'>
                                    </div>";
                                    
                                    echo "<div class='col-sm-6 mx-auto'>
                                    <label for='ville' >Ville</label>
                                    <input type='text' id='ville' class='form-control' name='ville' value='" . $row['ville'] ."' required  maxlength='254'>
                                    </div>";
                                    echo '<button class="btn btn-lg btn-primary btn-block mt-3 mb-3" type="submit">Modifier</button>';
                                    echo "</form>";
                                }
                                

            } else {
                echo '<div class="alert alert-info"><em>Vous n avez pas encore de compte client : Veuillez cliquer ici : </em><button type="button" class="btn btn-primary">Creer un profil</button></div>';
            }
        } else {
            echo '<div class="alert alert-danger"><em>Aucune information trouvée</em></div>';
        }
                    } 
                }
            }
        }
        
        mysqli_close($conn);
        
        
        
        
        
        if (!empty($message) && $message != ""){
            echo '<div class="alert-success"> <p>' . $message . '</p> </div>';
        }
        
        ?>
        
        </div>
        
    </main>
</body>
</html>