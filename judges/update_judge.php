<?php
    
    include "connects.php";

    $connected = connection();

    $id = $_GET['ID'];

    $sql = "SELECT * FROM `judges` WHERE id = '$id'";
    $dt = $connected->query($sql) or die ($connect->error);
    $row = $dt->fetch_assoc();
    



        if(isset($_POST['submit'])){
        $fullname  = $_POST['fullname'];
        $chairman = $_POST['chairman'];
        $photo  = $_FILES['photo'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];



        $target = "photos/" . basename($photo['name']);

        if ($photo["size"] <= 0) {
            $photo['name'] = $row['photo'];
        }
        elseif (move_uploaded_file($photo['tmp_name'], $target)) {
            echo "uploaded";
        }
        else{
            echo "error";
        }

        $sql = "UPDATE `judges` SET `full_name`=' $fullname',`is_chairman`='$chairman',`photo`='" .$photo['name']."',`username`=' $username',`password`=' $password' WHERE id = $id";
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
            <input type="text" name="fullname" value="<?php echo $row['full_name']?>"><br><br>

            <label >Is Chairman?</label>
            
            Yes<input type="radio" name="chairman" value="1">
           
            No<input type="radio" name="chairman" value="0"><br><br>

            <label>Upload Photo</label>
            <input type="file" name="photo"><br><br>

            <label>User Name</label>
            <input type="text" name="username" value="<?php echo $row['username']?>"><br><br>

            <label>Password</label>
            <input type="password" name="password"><br><br>

            <input type="submit" name="submit">
        

        </form>
        <br>
        
        <a href="insert_judge.php">View All List</a>
        
    </body>
</html>



