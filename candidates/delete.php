<?php

    include "connect.php";
    $connected = connection();

    $id_no = $_GET['ID'];

        $sql = "DELETE FROM `candidates` WHERE id = '$id_no'";
        $connected->query($sql) or die ($connect->error);
    
        echo header("location: select.php");

    
?>


