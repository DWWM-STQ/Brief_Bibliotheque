<?php
session_start();
$_SESSION['page'] = "Modificiation d'un utilisateur";
if ($_SESSION['roles'] != 'admin') {
    header('Location: ../HTML/home.php');
    exit();
}
require_once './COMPONENTS/navbar_admin.php';
require_once '../CRUD/config.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = trim($_GET['id']);
    $_SESSION['id'] = $id;
        $sql = "SELECT * FROM users WHERE id =?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            if(mysqli_stmt_bind_param($stmt, "i", $param_id)){
                
                $param_id = $id;
                
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $login = $row['login'];
                        $roles = $row['roles'];
                        

                    } else {
                        header('Location : ./admin_users.php');
                        exit();
                    }
                } else {
                    header('Location : ./admin_users.php');
                    exit();
                }
            } else {
                header('Location : ./admin_users.php');
                exit();
            }
        }
} else {
    $id = $_SESSION['id'];
    $sql = "UPDATE users SET login=?, roles=? WHERE id=$id";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_login, $param_roles);

        $param_login = $_POST['login'];
        $param_roles = $_POST['roles'];
            
        $message = "modification validée.";
            
        if (mysqli_stmt_execute($stmt)){
            header("Location: ./admin_users.php");
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
        <h2 class="mb-5 mt-3">Modification d'un utilisateur</h2>
        <div class="border-0">
        </div>        
        <form action="update_user.php" method="post">
            <?php if (!empty($erreur) && $erreur != "") {
                echo '<div class="alert-danger"> <p>' . $erreur . '</p> </div>';
            } ?>                            
                <div class="form-group col-md-5 mt-3">
                    <label for="login" class="sr-only">Login</label>
                    <input value="<?= $login ?>" type="text" id="login" name="login" class="form-control" placeholder="Duponthenri@gmail.com" required autofocus maxlength="254">
                </div>

                <div class="form-group col-md-5 mt-3">
                    <label for="roles" class="sr-only">Role</label>
                    <input value="<?= $roles ?>" type="text" id="roles" name="roles" class="form-control" placeholder="admin" required autofocus maxlength="254">
                </div>


                

                <button class="mt-3 btn btn-lg btn-warning btn-block float-end" type="submit">Valider les modifications</button>
            </div>
            
                            
        </form>
                        
    </div>
</body>
</html>