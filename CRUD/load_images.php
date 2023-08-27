<?php

    
    if (isset($_GET['img_id'])){
        $path = $_GET['img_id'];
        $sql = "SELECT img_blob, img_type, img_nom FROM images WHERE img_id = '$path'";
    require '../CRUD/config.php';
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)){
                    header("Content-type: " . $row[1]);
                    echo $row[0];

            }
        }
}
    }
    