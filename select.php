<?php

    include "connect.php";

    $connect = connection();

    $sql = "SELECT * FROM candidates";
    $dt = $connect->query($sql) or die ($connect->error);
    $row = $dt->fetch_assoc();

    
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Candidates List</title>

        <style>
            table{
              
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
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
                
            }

        </style>
    </head>

    <body>
        <button><a href="insert.php"><b>Add New</b></a></button>
        <h1>Candidates List</h1>
        <table>
            <tr>
                <th>CANDIDATE NO.</td> 
                <th>FULL NAME</td>
                <th>LOCATION</td>
                <th>Photo</th>
            </tr>
            <?php do{ ?>
            <tr>
                <td><?php echo $row ['id'] ?></td>
                <td><?php echo $row ['full_name'] ?></td>
                <td><?php echo $row ['location'] ?></td>
                <td><?php echo $row ['photo'] ?></td>
            </tr>
            <?php } while($row = $dt->fetch_assoc()) ?>
        </table>
    </body>
</html>

    
    


