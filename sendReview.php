<?php
	
	$mac = exec('getmac');
	$mac = strtok($mac, ' ');
	
	$date = $_POST["DATE"];
	$num = $_POST["NUMBER"];

	$dbcon = new mysqli('localhost', 'root', '', 'review');

	if($dbcon -> error) {
		die("No database found" . $dbcon -> error);
	}

	mysqli_set_charset($dbcon, "utf8");

	$query = "SELECT * FROM review WHERE mac = '$mac' AND date = $date";
	$result = mysqli_query($dbcon, $query);

	if(mysqli_num_rows($result) > 0) {	
		$query = "UPDATE review SET choice=$num WHERE mac = '$mac' AND date = $date";
		if($dbcon -> query($query) === TRUE) {} 

		mysqli_close($dbcon);
		return;
	}

	$query = "INSERT INTO review(date, choice, mac) VALUES($date, $num, '$mac')";

	if($dbcon -> query($query) === TRUE) {} 

	mysqli_close($dbcon);
?>