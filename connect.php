<?php

    function connection(){

        $host = "localhost";
        $username = "root";
        $password = "1234";
        $db = "miss_aclc_iriga_2022";

        $con_data = new mysqli($host, $username, $password, $db);

        if($con_data->connect_error){
            echo "connection error";
        }
        else{
            return $con_data;
        }
    }
?>