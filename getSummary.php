<?php

	$date = $_POST["DATE"];


	$dbcon = new mysqli('localhost', 'root', '', 'review');

	if($dbcon -> error) {
		die("No database found" . $dbcon -> error);
	}

	mysqli_set_charset($dbcon, "utf8");

	$query = "SELECT * FROM review WHERE date = $date";
	$result = mysqli_query($dbcon, $query);

	$polls = mysqli_num_rows($result);
	$sum = 0;

	if(mysqli_num_rows($result) > 0) {	
		while($row = mysqli_fetch_assoc($result)) {
			$sum += $row["choice"];
		}
	}

	$sum = $sum / $polls;

	echo '{"result":"' . $sum . '"}';


?>