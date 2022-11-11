<?php 
/*	include('header.php');
	include_once('header.php');
	require('header.php');*/
	include_once("Nav2.php");
	require_once('../controller/header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User list</title>
</head>
<body>
		
		<br><center>
		<table border="2">
			<tr>
				<th>DAY</th>
				<th>TIME</th>
				<th>DATE</th>
			</tr>

			<?php 
				$file = fopen('../Model/HridoyScedule.txt', 'r');
				while(!feof($file)){
					$user = fgets($file);
					$user = explode("|", $user);
					//print_r($user);
					if(count($user) > 1){
			?>
			<tr>
				<th><?=$user[0]?></th>
				<th><?=$user[1]?></th>
				<th><?=$user[2]?></th>
			</tr>
			<?php
					}
				}
			?>
		</table>
	</center>

</body>
</html>




