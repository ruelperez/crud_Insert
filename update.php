<?php

    include "connect.php";

    $connected = connection();
   $id = $_GET['ID'];

    $sql = "SELECT * FROM `candidates` WHERE id = '$id'";
    $dt = $connected->query($sql) or die ($connect->error);
    $row = $dt->fetch_assoc();
    



    if(isset($_POST['submit'])){
        $name   = $_POST['fullname'];
        $addreS = $_POST['address'];
        $image  = $_FILES['photo'];

        $target = "photo/" . basename($image['name']);

        if ($image["size"] <= 0) {
            $image['name'] = $row['photo'];
        }
        elseif (move_uploaded_file($image['tmp_name'], $target)) {
            echo "uploaded";
        }
        else{
            echo "error";
        }


        $sql = "UPDATE `candidates` SET `full_name`='$name',`location`='$addreS',`photo`= '" .$image['name']."'  WHERE id = '$id'";
        $connected->query($sql) or die ($connected->error);

       

        
        

        
        
            
            
        
        

        
        
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
            <input type="text" name="fullname" value = "<?php echo $row['full_name']?>">

            <label>Location</label>
            <input type="text" name="address" value = "<?php echo $row['location']?>">

            <label>Upload Photo</label>
            <input type="file" name="photo">

            <input type="submit" name="submit">

        </form>
        <h3><button><a href="select.php"><b>View All List</b></a></button></h3>
    </body>
</html>