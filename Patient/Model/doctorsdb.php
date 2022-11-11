<?php
class doctorsdb{
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "hms";

 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $conn;
 }


function GetDoctor($conn,$Speciality){
    $result = $conn->query("SELECT * FROM  doctors where Speciality like '$Speciality'");
    return $result;
}

function GetAppointment($conn,$Username,$Day,$Time,$Date,$Speciality){
    $check=false;
    $stmt=$conn->prepare("INSERT INTO appointment (Username,Day,Time,Date,Speciality) VALUES(?,?,?,?,?)"); 
    $stmt->bind_param("sssss",$_SESSION["Username"],$Day,$Time,$Date,$Speciality);
    if($stmt->execute())
    {
        echo "Appointment Fixed!!";
        $check=true;
    }
    else 
    {

        echo $stmt->error;
    }
    $stmt->close();
    return $check;
}


function AllAppointment($conn){
    $result = $conn->query("SELECT * FROM  appointment");
    return $result;
}

function TestPriceList($conn){
    $result = $conn->query("SELECT * FROM  testprice");
    return $result;
}

function BookCabin($conn,$Username,$Date,$Cabin){
    $check=false;
    $stmt=$conn->prepare("INSERT INTO cabinbooking (Username,Date,CabinNo) VALUES(?,?,?)"); 
    $stmt->bind_param("sss",$_SESSION["Username"],$Date,$Cabin);
    if($stmt->execute())
    {
        echo "Cabin Booking Confirmed!!";
        $check=true;
    }
    else 
    {

        echo $stmt->error;
    }
    $stmt->close();
    return $check;
}
function AllBookingCabin($conn){
    $result = $conn->query("SELECT * FROM  cabinbooking");
    return $result;
}

function MedicinePurchase($conn,$Username,$M1,$P1,$M2,$P2,$M3,$P3,$TP,$PM){
    $check=false;
    $stmt=$conn->prepare("INSERT INTO purchasemedicine (Username,Medicine1,Price1,Medicine2,Price2,Medicine3,Price3,TotalPrice,PaymentMethod) VALUES(?,?,?,?,?,?,?,?,?)"); 
    $stmt->bind_param("sssssssss",$Username,$M1,$P1,$M2,$P2,$M3,$P3,$TP,$PM);
    if($stmt->execute())
    {
        echo "Medicine Purchased Confirmed!!";
        $check=true;
    }
    else 
    {

        echo $stmt->error;
    }
    $stmt->close();
    return $check;
}


function MedicineSlip($conn,$Username){
    $result = $conn->query("SELECT * FROM  purchasemedicine where Username like '".$Username."'");
    return $result;
}

}


 ?>