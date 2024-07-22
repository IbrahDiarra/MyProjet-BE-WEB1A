<?php
    require_once('connect.php');

        $id = $_GET['id'];
        $DelSql = "DELETE FROM `cours` WHERE id='$id' ";

        $res = mysqli_query($con, $DelSql);
        if ($res){
            header("Location: index.php?page=voir_cours");
        }else{
            echo "Echec de suppression";
        }

?>