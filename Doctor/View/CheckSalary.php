<?php
include("../Model/doctorsdb.php");
session_start();
$connection = new doctorsdb();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowSalary($conobj,$_SESSION["Username"]);

include("Navigation.php");
?>


<html>
    <head>
    </head>
    <center>


    <body style="background-color:#a3dcf1;">
        <table border="3">
            <tr>
                <th>Username</th>
                <th>Month</th>
                <th>Salary</th>
                <th>Withdrawn</th>
            </tr>
            <?php
               
                if ($userQuery->num_rows > 0) {
                    while($row = $userQuery->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["Username"]."</td>";
                        echo "<td>".$row["Month"]."</td>";
                        echo "<td>".$row["Salary"]."</td>";
                        if($row["Withdrawn"]=="No"){
                            echo "<td><a href=../Controller/WithdrawController.php?id=".$row["Id"].">Click to withdraw</a></td>";
                        }
                        else{
                            echo "<td style='color:red'>".$row["Withdrawn"]."</td>";
                        }
                       
                        echo "</tr>";
                  } 
                }
            ?>
        </table>
            </center>
    </body>
</html>

