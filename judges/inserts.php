<?php

    include "connects.php";

    $connected = connection();

    if(isset($_POST['submit'])){
        $fullname   = $_POST['fullname'];
        $chairman = $_POST['chairman'];
        $photo  = $_FILES['photo'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];

        


        $target = "photos/" . basename($photo['name']);
        if (move_uploaded_file($photo['tmp_name'], $target)) {

           
            $sql = "INSERT INTO `judges`(`full_name`, `is_chairman`, `photo`, `username`, `password`) VALUES ('$fullname','$chairman','" .$photo['name']."','$username','$password')";
            $connected->query($sql) or die ($connected->error);

            echo "UPLOADED!!!";
        }
        else{
            echo "ERROR";
        }

        

        
    }
?>

<!DOCTYPE html>
<html lang="en">
     <head>
        <title>crud operation</title>

        <style>
            table{
              
                border-collapse: collapse;
                width: 90%;
                margin: auto;
            }
            th, td{
                border: 1px solid black;
                text-align: center;
            }
            

            
            h1{
                text-align: center;
                
            }
            a{
                text-align: center;
               
            }
            button{
                background-color: pink;
                margin-left: 25%;
                margin-bottom: 10px;
                width: 100px;
                height: 60px;
                
                
                
            }
    </head>

    <body>
        <form style="margin: auto; width: 220px;" action="" method="post" enctype="multipart/form-data">
            
            <label>Full Name</label>
            <input type="text" name="fullname"><br><br>

            <label >Is Chairman?</label>
            
            Yes<input type="radio" name="chairman" value=1>
           
            No<input type="radio" name="chairman" value=0><br><br>

            <label>Upload Photo</label>
            <input type="file" name="photo"><br><br>

            <label>User Name</label>
            <input type="text" name="username"><br><br>

            <label>Password</label>
            <input type="password" name="password"><br><br>

            <input type="submit" name="submit">

            

        </form>

        <?php

        $sql = "SELECT * FROM judges";
        $dt = $connected->query($sql) or die ($connect->error);
        $row = $dt->fetch_assoc();
           
        ?>

        <table>
            <tr>
                <th>Judge#</td> 
                <th>Full Name</td>
                <th>Is Chairman</td>
                <th>Photo</th>
                <th>UserName</th>
                <th>Password</th>
            </tr>
            <?php do{ ?>
            <tr>
                <td><?php echo $row ['id'] ?></td>
                <td><?php echo $row ['full_name'] ?></td>
                <td><?php echo $row ['is_chairman'] ?></td>
                <td><?php echo $row ['photo'] ?></td>
                <td><?php echo $row ['username'] ?></td>
                <td><?php echo $row ['password'] ?></td>
                <td><img src="photos/<?php echo $row['photo']?>" width=100px height=100px></td>
                <td><a href="update.php?ID= <?php echo $row['id']?>">UPDATE INFO.</a></td>
                <td><a href="delete.php?ID= <?php echo $row['id']?>">DELETE</a></td>
            
                
                
            </tr>
            <?php } while($row = $dt->fetch_assoc()) ?>
        </table>
    </body>
</html>

