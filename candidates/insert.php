<?php

    include "connect.php";

    $connected = connection();

    if(isset($_POST['submit'])){
        $name   = $_POST['fullname'];
        $addreS = $_POST['address'];
        $image  = $_FILES['photo'];

        /**
         * WAY TO GO, RUEL...
         * KEEP IT UP!
         *
         * TIP #1: During file uploads,
         * make sure to verify the type of file being uploaded.
         * The user might have uploaded malicious files such as his/her own PHP file.
         *
         */

        $target = "photo/" . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $target)) {

            /**
             * TIP #2: During record insert
             * make sure to sanitize the user input.
             * The user might have entered malicious SQL statements in your form.
             *
             */
            $sql = "INSERT INTO `candidates`(`full_name`, `location`, `photo`) VALUES ('$name', '$addreS', '" .$image['name']."')";
            $connected->query($sql) or die ($connected->error);

            echo "uploaded";
        }
        else{
            echo "error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
     <head>
        <title>crud operation</title>
    </head>

    <body>
        <form action="" method="post" enctype="multipart/form-data">

            <label>Full Name</label>
            <input type="text" name="fullname">

            <label>Location</label>
            <input type="text" name="address">

            <label>Upload Photo</label>
            <input type="file" name="photo">

            <input type="submit" name="submit">

        </form>
        <h3><button><a href="select.php"><b>View All List</b></a></button></h3>
    </body>
</html>