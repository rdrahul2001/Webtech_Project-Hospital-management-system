<?php

include ("../Model/doctorsdb.php");

$Email=$_REQUEST["Email"];

if($Email=="")
{
    echo "Try new Email";
}
else
{

    $connection=new doctorsdb();
    $conobj=$connection->OpenCon();
    $result=$connection->CheckMyMail($conobj,$_REQUEST["Email"]);

    if ($result->num_rows > 0)
    {
       echo "Email Already Used";
    }

    else{
    echo "Unique Email";
    }
    $connection->CloseCon($conobj);
}




?>