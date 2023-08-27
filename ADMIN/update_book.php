<?php
session_start();
$_SESSION['page'] = "Modificiation d'un livre";
if ($_SESSION['roles'] != 'admin') {
    header('Location: ../HTML/home.php');
    exit();
}
function upload_file($file){
    var_dump($_FILES);
    $uploadDir = 'C:\xampp\htdocs\BibliotheKa\\IMG\\';
    $uploadFileName = $uploadDir . basename($_FILES['fic']['name']);

    move_uploaded_file($_FILES['fic']['tmp_name'], $uploadFileName);
}
require_once './COMPONENTS/navbar_admin.php';
require_once '../CRUD/config.php';
require_once '../CRUD/security.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = trim($_GET['id']);
    $_SESSION['id'] = $id;
        $sql = "SELECT * FROM books WHERE id =?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            if(mysqli_stmt_bind_param($stmt, "i", $param_id)){
                
                $param_id = $id;
                
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $titre = $row['titre'];
                        $image = $row['image'];
                        $auteur = $row['auteur'];
                        $illustrateur = $row['illustrateur'];	
                        $category = $row['category'];
                        $nb_pages = $row['nb_pages'];
                        $editeur = $row['editeur'];
                        $ISBN = $row['ISBN'];
                        $pu_ht = $row['pu_ht'];
                        $tva = $row['tva'];
                        $description = $row['description'];
                        $stock = $row['stock'];
                        

                    } else {
                        header('Location : ./admin_books.php');
                        exit();
                    }
                } else {
                    header('Location : ./admin_books.php');
                    exit();
                }
            } else {
                header('Location : ./admin_books.php');
                exit();
            }
        }
} else {
    $id = $_SESSION['id'];
    $sql = "UPDATE books SET ISBN=?, auteur=?, illustrateur=?, category=?, nb_pages=?, editeur=?, pu_ht=?, tva=?, titre=?, description=?, image=?, stock=? WHERE id=$id";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "isssisddsssi", $param_ISBN, $param_auteur, $param_illustrateur, $param_category, $param_nb_pages, $param_editeur, $param_pu_ht, $param_tva, $param_titre, $param_description, $param_image, $param_stock);

        $param_ISBN = $_POST['ISBN'];
        $param_auteur = $_POST['auteur'];
        $param_illustrateur = $_POST['illustrateur'];
        $param_category = $_POST['category'];
        $param_nb_pages = $_POST['nb_pages'];
        $param_editeur = $_POST['editeur'];
        $param_pu_ht = $_POST['pu_ht'];
        $param_tva = $_POST['tva'];
        $param_titre = $_POST['titre'];
        $param_description = $_POST['description'];
        upload_file($_FILES);
        $param_image = './IMG/'.protect_montexte($_FILES['fic']['name']);
        $param_stock= $_POST['stock'];
            
        $message = "modification validée.";
            
        if (mysqli_stmt_execute($stmt)){
            header("Location: ./admin_books.php");
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
        <h2 class="mb-5 mt-3">Modification d'un livre</h2>
        <div class="border-0">
            <h5 class="mb-0">Veuillez bien remplir chaque champs</h5>
        </div>        
        <form enctype="multipart/form-data" action="update_book.php" method="post" id="book">
            <?php if (!empty($erreur) && $erreur != "") {
                echo '<div class="alert-danger"> <p>' . $erreur . '</p> </div>';
            } ?>                            
            <div class="form-row justify-content-center">
                <div class="form-group col-md-5 mt-3">
                    <label for="titre" class="sr-only">Titre</label>
                    <input value="<?= $titre ?>" type="text" id="titre" name="titre" class="form-control" placeholder="les misérables" required autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="fic" class="sr-only">Couverture</label>
                    <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="250000" />
                    <input value="<?= $image ?>" class="form-control" type="file" name="fic" size=50 required>
                </div>
            </div>

            
                <div class="form-group col-md-5 mt-3">
                    <label for="auteur" class="sr-only">Auteur (peut-être vide si auteur anonyme)</label>
                    <input value="<?= $auteur ?>" type="text" id="auteur" name="auteur" class="form-control" placeholder="Victor Hugo" autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="illustrateur" class="sr-only">Illustrateur (peut-être vide si anonyme ou sans illustration)</label>
                    <input value="<?= $illustrateur ?>" type="text" id="illustrateur" name="illustrateur" class="form-control" placeholder="inconnu" required maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="category" class="sr-only">Catégorie</label>
                    <input value="<?= $category ?>" type="text" id="category" name="category" class="form-control" placeholder="Aventure Fictif" requiredmaxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="nb_pages" class="sr-only">Nombre de pages</label>
                    <input  value="<?= $nb_pages ?>" type="text" id="nb_pages" name="nb_pages" class="form-control" placeholder="2 598" required maxlength="5">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="editeur" class="sr-only">Éditeur</label>
                    <input  value="<?= $editeur ?>" type="text" id="editeur" name="editeur" class="form-control" placeholder="Albert Lacroix et Cie" required maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="ISBN" class="sr-only">ISBN-10</label>
                    <input value="<?= $ISBN ?>" type="text" id="ISBN" name="ISBN" class="form-control" placeholder="9788423334186"required maxlength="40">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="pu_ht" class="sr-only">prix (hors-taxe)</label>
                    <input value="<?= $pu_ht?>" type="number" step="0.01" min="0" id="pu_ht" name="pu_ht" class="form-control" placeholder="3.50" required maxlength="10">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="tva" class="sr-only">TVA (France : 5.5)</label>
                    <input value="<?= $tva ?>" type="number" step="0.01" min="0" id="tva" name="tva" class="form-control" placeholder="5.5" value="5.5" requiredmaxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="description" class="sr-only">Description</label>
                    <textarea value="<?= $description ?>" class="form-control" id="book" type="text" name="description" placeholder="Les Misérables est un roman de Victor Hugo publié en 1862, l’un des plus vastes et des plus notables de la littérature du XIXᵉ siècle." rows="3" required><?= $description ?></textarea>
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="stock" class="sr-only">Stock</label>
                    <input type="number" value="<?= $stock ?>" id="stock" min="0" name="stock" class="form-control" placeholder="1" required maxlength="10">
                </div>

                <button class="mt-3 btn btn-lg btn-warning btn-block float-end" type="submit">Valider les modifications</button>
            </div>
            
                            
        </form>
                        
    </div>
</body>
</html>