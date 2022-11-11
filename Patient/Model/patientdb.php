<?php
class patientdb{
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "hms";

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $conn;
 }

 function Registration($conn,$Name,$Username,$Password,$Age,$Mobile,$Gender)
 {
    $check=false;
    $stmt=$conn->prepare("INSERT INTO patients (Name,Username,Password,Age,Mobile,Gender) VALUES(?,?,?,?,?,?)"); 
    $stmt->bind_param("ssssss",$Name,$Username,$Password,$Age,$Mobile,$Gender);
    if($stmt->execute())
    {
        echo "User Added Successfully!!";
        $check=true;
    }
    else 
    {
        echo "Already have an account!!!<br>";
        echo $stmt->error;
    }
    $stmt->close();
    return $check;
  
 }






 
 function Complain($conn,$Username,$Title,$Complain)
 {
    $check=false;
    $stmt=$conn->prepare("INSERT INTO complain (Username,Title,Complain) VALUES(?,?,?)"); 
    $stmt->bind_param("sss",$Username,$Title,$Complain);
    if($stmt->execute())
    {
        echo "Complain Added Successfully!!";
        $check=true;
    }
    else 
    {
        echo $stmt->error;
    }
    $stmt->close();
    return $check;
  
 }
 function Search($conn,$Name)
 {
     $result = $conn->query("SELECT TestName FROM testprice WHERE TestName like '%".$Name."%' ");
     return $result;
 }

 function Login($conn,$Username,$Password)
 {
    $result = $conn->query("SELECT * FROM patients WHERE Username='". $Username."' AND Password='". $Password."'");

        if ($result->num_rows > 0)
        {
            echo "Login Successful <br>";
        }
        else {
        echo "Login Failed !<br>";
        }
    return $result;
}

function UpdateUser($conn,$Name,$Username,$Password,$Age,$Mobile,$Gender)
{
    $sql = "UPDATE patients SET Name='$Name',Gender='$Gender',Mobile='$Mobile',Age='$Age',Password='$Password' WHERE Username='$Username'";
    if ($conn->query($sql) === TRUE) {
      
       $result= TRUE;
   } 
   else {
       $result= FALSE ;
       
   }
   return  $result;
}




function CheckUsername($conn,$User)
{
    $result = $conn->query("SELECT * FROM patients WHERE Username like '".$User."' ");
    return $result;
}

function CheckPhone($conn,$Phone)
{
    $result = $conn->query("SELECT * FROM patients WHERE Phone like '".$Phone."' ");
    return $result;
}

function ShowData($conn,$User)
{
    $result = $conn->query("SELECT * FROM patients WHERE Username='". $User."' AND Username='". $User."'");
    return $result;
}

function ShowData2($conn,$Email)
{
    $result = $conn->query("SELECT * FROM patients WHERE Email like '%".$Email."%' ");
    return $result;
}

function AllPatients($conn)
{
    $result = $conn->query("SELECT * FROM patients");
    return $result;
}
//
 







 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
return $result;
 }


 function UpdatePassword($conn,$table,$Phone,$Password)
 {
    $result1 = $conn->query("SELECT * FROM  $table Where Phone='$Phone'");
    $result=false;
    if ($result1->num_rows > 0)
    {
        $sql = "UPDATE $table SET Password='$Password' WHERE Phone='$Phone'";
        if ($conn->query($sql) === TRUE) {
          
           $result= TRUE;
       } 
       else {
           $result= FALSE;
           
       }
    }

     
    return  $result;
 }
 


function CloseCon($conn)
 {
    $conn -> close();
 }

}
?>