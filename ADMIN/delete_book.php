<?php
session_start();
$_SESSION['page'] = "Suppression d'un livre";
if ($_SESSION['roles'] != 'admin') {
    header('Location: ../HTML/home.php');
    exit();
}
require_once './COMPONENTS/navbar_admin.php';


if(isset($_POST['id']) && $_POST['id'] != null && !empty($_POST['id'])){
    $sql = "DELETE FROM books WHERE id=?";
    require '../CRUD/config.php';
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id=trim($_POST['id']);

        if(mysqli_stmt_execute($stmt)){
            mysqli_close($conn);
            header('Location: ./admin_books.php');
            exit();
        } else {
            echo "Erreur de suppression";
        }
        mysqli_close($conn);
    }
    else {
        echo "La connexion à échouée";
        if(empty(trim($_GET['id']))) {
            header('Location: ./admin_books.php');
            exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BibliotheKa | <?= $_SESSION['page'] ?></title>
</head>
<body>
<div class="wrapper container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Suppression d'un Livre</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-dark">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Etes vous sûr de vouloir supprimer ce livre ?</p>
                            <p>
                                <input type="submit" value="Oui" class="btn btn-danger">
                                <a href="./admin_books.php" class="btn btn-info">Non</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>