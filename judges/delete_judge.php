<?php

    include "connects.php";
    $connected = connection();

    $id_no = $_GET['ID'];

        $sql = "DELETE FROM `judges` WHERE id = '$id_no'";
        $connected->query($sql) or die ($connect->error);
    
        echo header("location: insert_judge.php");

    
?>


