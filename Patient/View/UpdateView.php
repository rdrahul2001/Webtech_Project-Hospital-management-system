<?php 
include_once("Nav2.php");
session_start();
if(empty($_SESSION["Username"])){
    header("Location: PatientSignIn.php");
  }
	require_once('../controller/header.php');
	$name = $_REQUEST['name'];
	$file = fopen('../Model/PatientInfo.txt', 'r');
	$data = "";
	while(!feof($file)){
		$user = fgets($file);
		$user = explode('|', $user);
		if($user[0] == $name){
			$data = $user;
			break;
		}
	}
?>
<html>
<head>
	<title>EDIT DOCTOR</title>
</head>
<body>
        <h3><a href="Edit.php"> Back </a> | 
		<a href="../controller/Logout.php"> Logout </a></h3>
		<br>

		<form action="../controller/UpdateCheck.php" method="post" enctype="">
			<fieldset>
                <legend>
                    Update Patient
                </legend>
                
            <table>
                 <tr>
                    <td>
                        NAME:
                    </td>
                    <td>
                    <input type = "text" name = "name" placeceholder = "name" value="<?=$data[1]?>">
                    </td>
                </tr>

                <tr>
                <tr>
                    <td>
                        Age
                    </td>
                    <td> 
                        <input type = "text" name = "Age" value="<?=$data[3]?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        MobileNo
                    </td>
                    <td> 
                        <input type = "number" name = "number" value="<?=$data[4]?>">
                    </td>
                </tr>

            </table>
            <br>
            <input type = "submit" name ="" value = "SUBMIT"><br>

            </fieldset>  
        </form>
    </body>
</html>
