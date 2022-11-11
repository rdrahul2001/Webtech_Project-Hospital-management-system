<?php
class doctorsdb{
function OpenCon()
 {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "hms";

        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        return $conn;
 }

 function Login($conn,$Username,$Password)
 {
    $result = $conn->query("SELECT * FROM doctors_db WHERE Username='". $Username."' AND Password='". $Password."'");

        if ($result->num_rows > 0)
        {
            echo "Login Successful <br>";
        }
        else {
        echo "Login Failed !<br>";
        }
    return $result;
}

function AddDoctor($conn,$Name,$Email,$Gender,$Username,$Password,$Contact,$Speciality,$Path)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO doctors_db (Name,Email,Gender,Username,Password,Contact,Speciality,Photo) VALUES(?,?,?,?,?,?,?,?)"); 
   $stmt->bind_param("ssssssss",$Name,$Email,$Gender,$Username,$Password,$Contact,$Speciality,$Path);
   if($stmt->execute())
   {
       echo "Doctor Added Successfully!!";
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

function UpdateAppointment($conobj,$Id)
{
    $sql = "delete from appointment WHERE Id='$Id'";
    if ($conobj->query($sql) === true) {
      
       $result= true;
   } 
   else {
       $result= false ;  
   }
   return  $conobj->query($sql);
}

function ShowData($conn,$User)
{
    $result = $conn->query("SELECT * FROM doctors_db WHERE Username='". $User."' AND Username='". $User."'");
    return $result;
}
function ShowAppointment($conn,$User)
{
    $result = $conn->query("SELECT * FROM appointment WHERE Username='". $User."' AND Username='". $User."'");
    return $result;
}

function Update($conobj,$Name,$Email,$Username,$Password,$Phone,$Speciality)
{
    $sql = "Update doctors_db SET Name='$Name',Contact='$Phone',Email='$Email',Password='$Password',Speciality='$Speciality' WHERE Username='$Username'";
    if ($conobj->query($sql) === TRUE) {
      
       $result= TRUE;
   } 
   else {
       $result= FALSE ;
       
   }
   return  $result;
}

function ChangePhoto($conobj,$Username,$Path)
{
    $sql = "Update doctors_db SET Photo='$Path' WHERE Username='$Username'";
    if ($conobj->query($sql) === true) {
      
       $result= true;
   } 
   else {
       $result= false ;
       
   }
   return  $conobj->query($sql);
}

function ChangePass($conobj,$Prev,$New,$User)
{
    $sql = "Update doctors_db SET password='$New' WHERE Password='$Prev' and Username='$User'";
    if ($conobj->query($sql) === true) {
      
       $result= true;
   } 
   else {
       $result= false ;
       
   }
   return  $conobj->query($sql);
}


function UpdateSalary($conobj,$Username,$Id)
{
    $sql = "Update salary SET Withdrawn='Withdrawn' WHERE Username='$Username' and Id='$Id'";
    if ($conobj->query($sql) === true) {
      
       $result= true;
   } 
   else {
       $result= false ;
       
   }
   return  $conobj->query($sql);
}


function ShowSalary($conn,$User)
{
    $result = $conn->query("SELECT * FROM salary WHERE Username='". $User."'");
    return $result;
}
function ShowPrescription($conn,$User)
{
    $result = $conn->query("SELECT * FROM prescription WHERE Doctor='". $User."'");
    return $result;
}

 
function AddAppointment($conn,$Username,$Day,$Time,$Date,$Speciality)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO appointment (Username,Day,Time,Date,Speciality) VALUES(?,?,?,?,?)"); 
   $stmt->bind_param("sssss",$Username,$Day,$Time,$Date,$Speciality);
   if($stmt->execute())
   {
       echo "Appointment Added Successfully!!";
       $check=true;
   }
   else 
   {
       echo $stmt->error;
   }
   $stmt->close();
   return $check;
 

}

function AddPrescription($conn,$Username,$Name,$Age,$Medicine,$Speciality)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO prescription (Doctor,PatientName,Age,Medicine,Speciality) VALUES(?,?,?,?,?)"); 
   $stmt->bind_param("sssss",$Username,$Name,$Age,$Medicine,$Speciality);
   if($stmt->execute())
   {
       echo "Prescription Created Successfully!!";
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
    $result = $conn->query("SELECT * FROM prescription WHERE PatientName like '%".$Name."%' ");
    return $result;
}
 



function Doctors($conn)
 {
$result = $conn->query("SELECT * FROM  doctors_reg");
return $result;
 }
 

 function Delete($conn,$id,$table)
 {
    $result = $conn->query("Delete  FROM  $table where Id like '".$id."'");
    return $result;
 }
 

 function CheckMyMail($conn,$Email){
    $result = $conn->query("SELECT * FROM doctors_db WHERE Email like '".$Email."' ");
    return $result;
}


 function  AllPatients($conn)
 {
$result = $conn->query("SELECT * FROM  admittedpatient");
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