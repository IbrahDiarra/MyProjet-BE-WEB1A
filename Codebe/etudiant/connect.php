<?php
   $con = mysqli_connect("localhost","root","","db_projet");
       if (!$con){
          die("database connection failed".mysqli_error($con));
       }

    $select_db = mysqli_select_db($con,'db_projet');
      if (!$select_db){
        die("database selected failed".mysqli_error($con));
      }
?>