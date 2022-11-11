<?php 
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {

    $DAY = $_REQUEST['DAY'];
	$Time = $_REQUEST['Time'];
	$DATE = $_REQUEST['DATE'];
	

	

	if ($DAY== null || $Time == null || $DATE == null)
	 {
		echo "invalid ";
	}else{
		$data = $DAY."|".$Time."|".$DATE."\r\n";
		$file = fopen('../Model/HridoyScedule.txt', 'a');
		fwrite($file, $data);
		header('location:../View/HridoyFixed.php');
		

	}

}

?>