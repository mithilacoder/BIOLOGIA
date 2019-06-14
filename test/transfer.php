<?php
$servername = "localhost";
$username = "chandan2520";
$password = "iamtiger#1";
$dbname = "id9714525_my_database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `facts` ORDER BY `ID` ASC";
$all = mysqli_query($conn, $sql);
	while($fact = mysqli_fetch_row($all))
	{
		$head = $fact[1];
		$body = $fact[2];
		$head = addslashes($head);
		$body = addslashes($body);
		$sql = "INSERT INTO `facts_copy`(`HEADER`, `BODY`) VALUES ('$head','$body')";
		mysqli_query($conn, $sql);
	}
mysqli_close($conn);
?>