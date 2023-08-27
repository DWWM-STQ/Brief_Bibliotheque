<?php
function get_books($nom, $prenom, $login)
{
    require '../CRUD/config.php';
    $sql = "SELECT * FROM books WHERE stock > 0";
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    } else {
        $user_id = "";
    }

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-md-3">
                <div class="card mb-4 box-shadow">';
                echo '<a class="a_link" href=\'./book.php?id=' . $row['id'] . '\'><img class="card-img-top" src=".' . $row['image'] . '" alt="' . $row['image'] . '" ></a>';
                echo '<div class="card-body">
                <h4 class="mb-3">' . $row['titre'] . '</h4>
                <h6 class="mb-3">' . $row['category'] . '</h6>
                <p class="card-text desc">' . $row['description'] . '</p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
                if ((isset($_SESSION['id'])) && (!empty($_SESSION['id'])) && (isset($_SESSION['login'])) && (!empty($_SESSION['login']))) {
                    $login = $_SESSION['login'];
                    echo '<form method="post" action="./traitement_emprunt.php">
                    <input type="hidden" name="nom" value="' . $nom . '">
                    <input type="hidden" name="prenom" value="' . $prenom . '">
                    <input type="hidden" name="client_id" value="' . $user_id . '">
                    <input type="hidden" name="titre" value="' . $row['titre'] . '">
                    <input type="hidden" name="image" value="' . $row['image'] . '">
                    <input type="hidden" name="login" value="' . $login . '">
                    <input type="hidden" name="id" value="' . $row['id'] . '">';
                    $book_id = $row['id'];
                    $titre = $row['titre'];
                    $sql2 = "SELECT * FROM emprunts WHERE client_id = '$user_id' AND titre_livre = '$titre' AND date_retour IS NULL";
                    if ($query = mysqli_query($conn, $sql2)) {
                        if (mysqli_num_rows($query) > 0) {
                            while ($rows = mysqli_fetch_array($query)) {
                                $book_id = $rows['id'];
                                if ($rows['titre_livre'] == $row['titre']) {
                                    echo '<button class="btn btn-sm btn-primary"><a class="a_link" href="./rendre_book.php?id=' . $book_id . '" class="mr-3" data-toggle="tooltip">Rendre</a></button>';
                                    continue;
                                }
                            }
                        } else {
                            echo '<button type="submit" class="btn btn-sm btn-primary">Emprunter</button>';
                        }
                    } else {
                        echo '<button type="submit" class="btn btn-sm btn-primary">Emprunter</button>';
                    }
                    echo '</form>';
                } else {
                    echo '<button type="button" class="btn btn-sm btn-primary"><a class="a_link" href="./connexion.php">Emprunter</a></button>';
                }
                echo '</div>';
                echo '<small class="text-muted">Prix: ' . round(($row['pu_ht'] * $row['tva'] / 100) + $row['pu_ht'], 2) . ' €</small>
                </div>
                </div>
            </div>
        </div>';
            }
        }
    }
    mysqli_close($conn);
}

function get_book($book_id)
{

    require '../CRUD/config.php';
    $sql = "SELECT * FROM books WHERE id = '$book_id'";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $book_id = $row['id'];
                $titre = $row['titre'];
                $_SESSION['page'] = $row['titre'];
                $titre = $row['titre'];
                $description = $row['description'];
                $image = $row['image'];
                $auteur = $row['auteur'];
                $illustrateur = $row['illustrateur'];
                $category = $row['category'];
                $nb_pages = $row['nb_pages'];
                $editeur = $row['editeur'];
                $prix = round(($row['pu_ht'] * $row['tva'] / 100) + $row['pu_ht'], 2) . "€";
            }
        }
    } ?>
    <div class="col-md-6">
        <div class="mt-5">
            <img style="max-width:80%;" src=".<?= $image; ?>" />
        </div>

        <div class="col-xs-3" style="border:0px solid gray">


            <!-- <small>(<?= $avis; ?> avis)</small> -->
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <h2 class="text-warning mb-4"><?= $titre ?></h2>
        <h5 class="text-capitalize">Auteur : <a href="#"><?= $auteur; ?></a></h5>
        <h5 class="text-capitalize">Illustrateur : <a href="#"><?= $illustrateur; ?></a></h5>
        <h5 class="text-capitalize">Éditeur : <a href="#"><?= $editeur; ?></a></h5>
        <h5 class="text-capitalize">Catégorie : <a href="#"><?= $category; ?></a></h5>
        <h5>Pages : <?= $nb_pages; ?></h5>
        <h5>Prix : <?= $prix; ?></h5>
        <p class=""><?= $description ?></p>
        <form method="post" action="./traitement_emprunt.php">
            <?php if ((isset($_SESSION['id'])) && (!empty($_SESSION['id'])) && (isset($_SESSION['login'])) && (!empty($_SESSION['login']))) {
                $login = $_SESSION['login'];
                echo '<form method="post" action="./traitement_emprunt.php">
                <input type="hidden" name="titre" value="' . $titre . '">
                <input type="hidden" name="image" value="' . $image . '">
                <input type="hidden" name="login" value="' . $login . '">
                <input type="hidden" name="id" value="' . $book_id . '">';
                $user_id = $_SESSION['id'];
                $sql2 = "SELECT * FROM emprunts WHERE client_id = '$user_id' AND titre_livre = '$titre' AND date_retour IS NULL ";
                if ($query = mysqli_query($conn, $sql2)) {
                    if (mysqli_num_rows($query) > 0) {
                        while ($rows = mysqli_fetch_array($query)) {
                            if ($rows['titre_livre'] == $titre) {
                                $book_id = $rows['id'];
                                echo '<button class="btn btn-sm btn-primary"><a class="a_link" href="./rendre_book.php?id=' . $book_id . '" class="mr-3" data-toggle="tooltip">Rendre</a></button>';
                                continue;
                            }
                        }
                    } else {
                        echo '<button type="submit" class="btn btn-sm btn-primary">Emprunter</button>';
                    }
                } else {
                    echo '<button type="submit" class="btn btn-sm btn-primary">Emprunter</button>';
                }
            }else {
                echo '<button type="button" class="btn btn-sm btn-primary"><a class="a_link" href="./connexion.php">Emprunter</a></button>'; 
            } ?>
        </form>
    </div>
<?php mysqli_close($conn);
           
        }
