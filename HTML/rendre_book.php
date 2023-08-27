<?php
session_start();
require_once '../CRUD/config.php';
$id = $_GET['id'];
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['login'])){
    $date = date('y-m-d');
        $sql6 = "UPDATE emprunts SET date_retour=? WHERE id = $id";
        if($stmt3 = mysqli_prepare($conn, $sql6)){
            if(mysqli_stmt_bind_param($stmt3, "s", $param_date)){
                $param_date = $date;
                
                if(mysqli_stmt_execute($stmt3)){
                    //Ajouter + 1 en stock
                    header('Location: http://localhost/bibliotheka/HTML/myBooks.php');
                    exit();
                } else {
                    header('Location: http://localhost/bibliotheka/HTML/myBooks.php');
                    exit();
                }
            } else {
                header('Location: http://localhost/bibliotheka/HTML/myBooks.php');
                exit();
            }
            
        }
}else{
    header('Location : http://localhost/bibliotheka/HTML/myBooks.php');
    exit();
}


