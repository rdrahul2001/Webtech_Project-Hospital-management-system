
<?php 
include_once("Nav2.php");
	require_once('../controller/header.php');
?>




<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fixed Schedule</title>
	<form action="../controller/MuradCheck.php" method="post" enctype="">
		<!DOCTYPE html>

<head>
	<style>
body {
  background-image: url('../image/19.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

</style>
<body>


<b><center>	 <p style="color:green;font-size:50px;">Welcome to Fixed Schedule Page</p> 
	          <p style="color:green;font-size:30px;">Please Confirm your schedule Schedule</p> </br></br>  


</Center></b><br>
	
		<center>
        <table>
        	<tr>
        		<td>DAY</td>
        		<td><input type="text" name="DAY" value=""></td>
        	</tr>
        	<tr>
        		<td>Time </td>
        		<td><input type="text" name="Time" value=""></td>
        	</tr>
        	<tr>
        		<td>DATE </td>
        		<td><input type="date" name="DATE" value=""></td>
        	</tr>
        	<tr>
        		<td></td>
        		<td><input type="submit" name="" value="submit">
        			 <a href="MuradSchedulesView.php">Please View already fixed Scedule First</a>
        			</td>
        		</tr>
        </table></center>
 
	
</form>


</head>
<body>

</body>
</html>
