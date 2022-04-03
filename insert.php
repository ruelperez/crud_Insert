<?php

    include "connect.php";

    $connected = connection();

    if(isset($_POST['submit'])){
        $name = $_POST['fullname'];
        $addreS = $_POST['address'];
        $image = $_FILES['photo']['name'];
        
       $target = "photo/" .basename($_FILES['photo']['name']);
        

        $sql = "INSERT INTO `candidates`(`full_name`, `location`, `photo`) VALUES ('$name','$addreS','$image')";

        $connected->query($sql) or die ($connected->error);
        
        if (move_uploaded_file($_FILES['tmp_name']['name'],"$target")) {
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

    </body>
</html>