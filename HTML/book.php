<?php 
session_start();
require_once '../COMPONENTS/navbar.php';
$id= $_GET['id'];
require_once './get_books.php';
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
        
        <div class="container">
            <div class="container-fluid">
                <div class="wrapper row">
                <?= get_book($id); ?>
                    </div>
                </div>
        </div>


                
                    


       
</body>
</html>

