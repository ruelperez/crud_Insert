<?php

    include "connect.php";

    $connect = connection();

    $sql = "SELECT * FROM candidates";
    $dt = $connect->query($sql) or die ($connect->error);
    $row = $dt->fetch_assoc();

    if(isset($_POST['deleted'])){

        $id_num = $_POST['id'];

        $sql = "DELETE FROM `candidates` WHERE id = '$id_num'";
        $connected->query($sql) or die ($connect->error);
       
    }




?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Candidates List</title>

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

        </style>
    </head>

    <body>
    
        <h1>Candidates List</h1>
        <button><a href="insert.php"><b>Add New</b></a></button>
        <table>
            <tr>
                <th>CANDIDATE #</td> 
                <th>FULL NAME</td>
                <th>LOCATION</td>
                <th>Photo</th>
            </tr>
            <?php do{ ?>
            <tr>
                <td><?php echo $row ['id'] ?></td>
                <td><?php echo $row ['full_name'] ?></td>
                <td><?php echo $row ['location'] ?></td>
                <td><img src="photo/<?php echo $row['photo']?>" width=100px height=100px></td>
                <td><a href="update.php?ID= <?php echo $row['id']?>">UPDATE INFO.</a></td>
                <td><a href="delete.php?ID= <?php echo $row['id']?>">DELETE</a></td>
            
                
                
            </tr>
            <?php } while($row = $dt->fetch_assoc()) ?>
        </table>
    </body>
</html>

    
    


