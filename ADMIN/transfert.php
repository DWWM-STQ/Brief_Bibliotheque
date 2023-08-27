<?php
if (isset($_FILES['fic']) )
{
    if(isset($_FILES) && !empty($_FILES)){

        function transfert(){
            require '../CRUD/config.php';
            $ret        = false;
            $img_blob   = '';
            $img_taille = 0;
            $img_type   = '';
            $img_nom    = '';
            $taille_max = 250000;
            $ret= is_uploaded_file($_FILES['fic']['tmp_name']);
            
            if (!$ret) {
                return false;
            } else {
                $img_taille = $_FILES['fic']['size'];
                
                if ($img_taille > $taille_max) {
                    echo "Trop gros !";die;
                    return false;
                }
                
                $img_type = $_FILES['fic']['type'];
                $img_nom = $_FILES['fic']['name'];
                $img_blob = file_get_contents($_FILES['fic']['tmp_name']);
                $sql3 = "INSERT INTO images (
                                    img_nom, img_taille, img_type, img_blob
                                    ) VALUES (?,?,?,?) ";
            if($stmt = mysqli_prepare($conn, $sql3)) {
                mysqli_stmt_bind_param($stmt, "ssss", $param_nom, $param_taille, $param_type, $param_blob);
    
                $param_nom = $img_nom;
                $param_taille = $img_taille;
                $param_type = $img_type;
                $param_blob = addslashes($img_blob);
                if(mysqli_stmt_execute($stmt)){
                    echo "Création effectuée";
                }else {
                    echo "erreur de création du livre";
                }
            }else{
                
            }
            return true;
            }
        }
    }
}