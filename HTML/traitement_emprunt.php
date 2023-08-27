<?php 
session_start();
require_once '../CRUD/config.php';
include_once './get_user.php';
$id = $_SESSION['id'];

if (get_user() && isset($_POST['id']) && ($_POST['id'] != null)){
    $titre =  htmlspecialchars($_POST['titre']);
    $sql = "INSERT INTO emprunts (titre_livre, image, date_emprunt, date_retour_attendu, client_id, nom, prenom, login) VALUES (?,?,?,?,?,?,?,?)";
    $nom = get_data('nom', $id);
    $prenom = get_data('prenom', $id);
    $login = get_data('login', $id);
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "ssssisss", $param_titre_livre, $param_image, $param_date_emprunt, $param_date_retour_attendu, $param_client_id, $param_nom, $param_prenom, $param_login);
        $param_titre_livre = $_POST['titre'];
        $param_image = $_POST['image'];
        $param_date_emprunt = date('y-m-d');
        $param_date_retour_attendu  = date('y-m-d', strtotime('+3 months'));
        $param_client_id  = $id;
        $param_nom  = $nom;
        $param_prenom = $prenom;
        $param_login = $_POST['login'];
        if(mysqli_stmt_execute($stmt)){
            $sql2 = "UPDATE books SET stock = stock -1 WHERE titre = '$titre'";
            $stmt2 = mysqli_prepare($conn, $sql2)->execute();

            }
            header('Location: ./myBooks.php');
            exit();
        }
    } else {
    header('Location: ./books.php');
    exit();
}