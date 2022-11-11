<?php
include "../Model/patientdb.php";

$name=$_POST["Search"];

if($name=="")
{
    echo "";
}

else
{

    $connection=new patientdb();
    $conobj=$connection->OpenCon();
    $result=$connection->Search($conobj,$name);

    if ($result->num_rows > 0)
    {   while($row = $result->fetch_assoc()) {
        echo $row["TestName"]."<br>";

    }

    }

    else{
             echo "No Result Found";
    }
    $connection->CloseCon($conobj);
}




?>