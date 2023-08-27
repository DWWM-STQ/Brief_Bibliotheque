<?php
session_start();
$_SESSION['page'] = "Modificiation d'un client";
if ($_SESSION['roles'] != 'admin') {
    header('Location: ../HTML/home.php');
    exit();
}
require_once './COMPONENTS/navbar_admin.php';
require_once '../CRUD/config.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = trim($_GET['id']);
    $_SESSION['id'] = $id;
        $sql = "SELECT * FROM clients WHERE id =?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            if(mysqli_stmt_bind_param($stmt, "i", $param_id)){
                
                $param_id = $id;
                
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $nom = $row['nom'];
                        $prenom = $row['prenom'];
                        $telephone = $row['telephone'];
                        $adresse = $row['adresse'];
                        $complement = $row['complement'];
                        $cp = $row['cp'];
                        $ville = $row['ville'];
                        

                    } else {
                        header('Location : ./admin_clients.php');
                        exit();
                    }
                } else {
                    header('Location : ./admin_clients.php');
                    exit();
                }
            } else {
                header('Location : ./admin_clients.php');
                exit();
            }
        }
} else {
    $id = $_SESSION['id'];
    $sql = "UPDATE clients SET nom=?, prenom=?, telephone=?, adresse=?, complement=?, cp=?, ville=? WHERE id=$id";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "sssssss", $param_nom, $param_prenom, $param_telephone, $param_adresse, $param_complement, $param_cp, $param_ville);

        $param_nom = $_POST['nom'];
        $param_prenom = $_POST['prenom'];
        $param_telephone = $_POST['telephone'];
        $param_adresse = $_POST['adresse'];
        $param_complement = $_POST['complement'];
        $param_cp = $_POST['cp'];
        $param_ville = $_POST['ville'];
            
        $message = "modification validée.";
            
        if (mysqli_stmt_execute($stmt)){
            header("Location: ./admin_clients.php");
            exit();
        } else {
            echo "erreur";
        }
    }else{
        var_dump($conn);
    }
    
    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../COMPONENTS/links.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BibliotheKa | <?= $_SESSION['page'] ?></title>
</head>
<body>
<div class="container mt-7">
        <h2 class="mb-5 mt-3">Modification d'un client</h2>
        <div class="border-0">
            <h5 class="mb-0">Veuillez bien remplir chaque champs</h5>
        </div>        
        <form action="update_client.php" method="post">
            <?php if (!empty($erreur) && $erreur != "") {
                echo '<div class="alert-danger"> <p>' . $erreur . '</p> </div>';
            } ?>                            
                <div class="form-group col-md-5 mt-3">
                    <label for="nom" class="sr-only">Nom</label>
                    <input value="<?= $nom ?>" type="text" id="nom" name="nom" class="form-control" placeholder="Dupont" required autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="prenom" class="sr-only">Prénom</label>
                    <input value="<?= $prenom ?>" type="text" id="prenom" name="prenom" class="form-control" placeholder="Henri" required autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="telephone" class="sr-only">Telephone</label>
                    <input value="<?= $telephone ?>" type="tel" id="telephone" name="telephone" required class="form-control" placeholder="06.95.06.06.06" autofocus maxlength="20">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="adresse" class="sr-only">Adresse</label>
                    <input value="<?= $adresse ?>" type="text" id="adresse" name="adresse" class="form-control" required placeholder="01, rue jean jaurès" autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="complement" class="sr-only">Complement</label>
                    <input value="<?= $complement ?>" type="text" id="complement" name="complement" class="form-control" placeholder="Bat. A" autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="cp" class="sr-only">Code postal</label>
                    <input value="<?= $cp ?>" type="text" id="cp" name="cp" class="form-control" placeholder="75000" required autofocus maxlength="50">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="ville" class="sr-only">Ville</label>
                    <input value="<?= $ville ?>" type="text" id="ville" name="ville" class="form-control" placeholder="Paris" required autofocus maxlength="254">
                </div>

                

                <button class="mt-3 btn btn-lg btn-warning btn-block float-end" type="submit">Valider les modifications</button>
            </div>
            
                            
        </form>
                        
    </div>
</body>
</html>