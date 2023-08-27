<?php
function get_user(){
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    } else {
        $id="";
    }
    require '../CRUD/config.php';
    $sql5 = "SELECT clients.nom, clients.prenom, clients.user_id, users.login FROM clients, users WHERE clients.user_id = '$id' and users.id = clients.user_id";
                        if($result = mysqli_query($conn, $sql5)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $nom = $row['nom'];
                                    $prenom = $row['prenom'];
                                    $login = $row['login'];
                                    return $nom;
                                    return $prenom;
                                    return $login;
                                }
                            }
                        }
                        mysqli_close($conn);
}

function get_data($data, $id){
    require '../CRUD/config.php';
    $sql5 = "SELECT clients.nom, clients.prenom, users.login FROM clients, users WHERE clients.user_id = '$id' and users.id = clients.user_id";
    if($result = mysqli_query($conn, $sql5)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $data= $row[$data];
                return $data;
            }
        }
    }
    mysqli_close($conn);
}
                        