<?php
    require_once('connect.php');

        $id = $_GET['id'];
        $DelSql = "DELETE FROM `etudiant` WHERE id='$id' ";

        $res = mysqli_query($con, $DelSql);
        if ($res){
            header("Location: index.php?page=voir_etudiant");
        }else{
            echo "Echec de suppression";
        }

?>