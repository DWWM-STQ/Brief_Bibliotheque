<?php
session_start();
$_SESSION['page'] = "Gestion des livres";
if ($_SESSION['roles'] != 'admin') {
    header('Location: ../HTML/home.php');
    exit();
}
require_once './COMPONENTS/navbar_admin.php';
require '../CRUD/config.php';

function upload_file($file){
    var_dump($_FILES);
    $uploadDir = 'C:\xampp\htdocs\BibliotheKa\\IMG\\';
    $uploadFileName = $uploadDir . basename($_FILES['fic']['name']);

    move_uploaded_file($_FILES['fic']['tmp_name'], $uploadFileName);
}

if(isset($_POST['titre'], $_POST['description'])){
    
    require '../CRUD/security.php';
    $sql = 'INSERT INTO books (ISBN, auteur, illustrateur, category, nb_pages, editeur, pu_ht, tva, titre, description, image, stock) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssisddsssi", $param_ISBN, $param_auteur, $param_illustrateur, $param_category, $param_nb_pages, $param_editeur, $param_pu_ht,$param_tva, $param_titre, $param_description, $param_image, $param_stock);

        $param_ISBN = protect_montexte($_POST['ISBN']);
        $param_auteur = protect_montexte($_POST['auteur']);
        $param_illustrateur = protect_montexte($_POST['illustrateur']);
        $param_category = protect_montexte($_POST['category']);
        $param_nb_pages = protect_montexte($_POST['nb_pages']);
        $param_editeur = protect_montexte($_POST['editeur']);
        $param_pu_ht = protect_montexte($_POST['pu_ht']);
        $param_tva = protect_montexte($_POST['tva']);
        $param_titre = protect_montexte($_POST['titre']);
        $param_description = protect_montexte($_POST['description']);
        upload_file($_FILES);
        $param_image = './IMG/'.protect_montexte($_FILES['fic']['name']);
        // $_FILES['fic']['full_path']
        $param_stock = protect_montexte($_POST['stock']);
        




        if(mysqli_stmt_execute($stmt)){
            include './transfert.php';
            transfert();
        }else {
            echo "erreur de création du livre";
        }
    
    }
}

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
        <h2 class="mb-5 mt-3">Ajout d'un livre</h2>
        <div class="border-0">
            <h5 class="mb-0">Veuillez bien remplir chaque champs</h5>
        </div>        
        <form enctype="multipart/form-data" action="create_book.php" method="post" id="book">                          
            <div class="form-row justify-content-center">
                <div class="form-group col-md-5 mt-3">
                    <label for="titre" >Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" placeholder="les misérables" required autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="fic" >Image de couverture</label>
                    <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="250000" />
                    <input class="form-control" type="file" name="fic" size=50 required>
                </div>
            </div>

            
                <div class="form-group col-md-5 mt-3">
                    <label for="auteur" >Auteur (peut-être vide si auteur anonyme)</label>
                    <input type="text" id="auteur" name="auteur" class="form-control" placeholder="Victor Hugo" autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="illustrateur" >Illustrateur (peut-être vide si anonyme ou sans illustration)</label>
                    <input type="text" id="illustrateur" name="illustrateur" class="form-control" placeholder="inconnu" required maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="category" >Catégorie</label>
                    <input type="text" id="category" name="category" class="form-control" placeholder="Aventure Fictif" requiredmaxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="nb_pages" >Nombre de pages</label>
                    <input type="text" id="nb_pages" name="nb_pages" class="form-control" placeholder="2 598" required maxlength="5">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="editeur" >Éditeur</label>
                    <input type="text" id="editeur" name="editeur" class="form-control" placeholder="Albert Lacroix et Cie" required maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="ISBN" >ISBN-10</label>
                    <input type="text" id="ISBN" name="ISBN" class="form-control" placeholder="9788423334186"required maxlength="40">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="pu_ht" >prix (hors-taxe)</label>
                    <input type="number" step="0.01" min="0" id="pu_ht" name="pu_ht" class="form-control" placeholder="3.50" required maxlength="10">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="tva" >TVA (France : 5.5)</label>
                    <input type="number" step="0.01" min="0" id="tva" name="tva" class="form-control" placeholder="5.5" value="5.5" requiredmaxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="description" >Description</label>
                    <textarea class="form-control" id="book" type="text" name="description" placeholder="Les Misérables est un roman de Victor Hugo publié en 1862, l’un des plus vastes et des plus notables de la littérature du XIXᵉ siècle." rows="3" required></textarea>
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="stock" >Stock</label>
                    <input type="number" id="stock" min="0" name="stock" class="form-control" placeholder="1" required maxlength="10">
                </div>

                <button class="mt-3 btn btn-lg btn-warning btn-block float-end" type="submit">Ajouter le livre</button>
            </div>
            
                            
        </form>
                        
    </div>
</body>

</html>