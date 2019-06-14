<?php
	session_start();
	if(!isset($_SESSION['log']))
	{
		header("Location:/admin/");
		exit();
	}
?>
<?php
	if(isset($_POST['submit']))
	{
		$sql = $_POST['sql'];
		$servername = "localhost";
		$username = "chandan2520";
		$password = "iamtiger#1";
		$dbname = "id9714525_my_database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$result = mysqli_query($conn, $sql);
		$sql = explode(" ", $sql);
		if(in_array("select", $sql) || in_array("SELECT", $sql))
		    while($row = mysqli_fetch_assoc($result))
		    {
        		print_r("<pre style='color:white;'>");
        		print_r($row);
        		print_r("</pre>");
		    }
		mysqli_close($conn);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<title>Manual MySQL Query</title>
<link rel="icon" href="/images/icon.gif">
<style>
.btn
{
    width: 100px;
	margin: 0px 5px;
}
</style>
</head>
<body class="bg-dark">
<div class="container">
<h3 style="color: white; margin-top: 10px;"><center>Type MySQL Query</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
	<a href="/admin/manual_query" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
<?php
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SHOW TABLES FROM $dbname";
	$result = mysqli_query($conn, $sql);
	echo "TABLES OD DATABASE: <br><hr>";
	$x =0;
	while($row = mysqli_fetch_row($result))
	{
		echo $row[0]."<br>";
		$table[$x] = $row[0];
		$x++;
	}
	echo "<hr style='background-color: black; height: 5px; border-radius: 5px;'>";
	$y = 0;
	while($x--)
	{
		$t = $table[$y];
		$sql = "SHOW COLUMNS FROM $t";
		$result = mysqli_query($conn, $sql);
		echo "COLUMNS OF TABLE ($t): <br><hr>";
		while($row = mysqli_fetch_array($result))
			echo $row[0]."<br>";
		echo "<hr style='background-color: black; height: 5px; border-radius: 5px;'>";
		$y++;
	}
?><hr style="background-color: black; height: 5px; border-radius: 5px;">
	<p>SELECT * FROM `login_details` WHERE 1</p>
	<p>SELECT `USERNAME`, `PASSWORD` FROM `login_details` WHERE 1</p>
	<p>INSERT INTO `login_details`(`USERNAME`, `PASSWORD`) VALUES ([value-1],[value-2])</p>
	<p>UPDATE `login_details` SET `USERNAME`=[value-1],`PASSWORD`=[value-2] WHERE 1</p>
	<p>DROP TABLE table_name</p>
	<p>TRUNCATE TABLE table_name</p>
	<p>RENAME TABLE old_table_name TO new_table_name</p>
	<p>CREATE TABLE new_tbl LIKE orig_tbl</p>
	<p>INSERT new_tbl SELECT * FROM orig_tbl</p>
<hr style="background-color: black; height: 5px; border-radius: 5px;">
	<form action="/admin/manual_query" enctype="multipart/form-data" method="post">
	  
	  <div class="form-group">
			<label for="textarea" class="font-weight-bold">ENTER QUERY:</label>
			<textarea class="form-control" id="textarea" name="sql" placeholder="Enter MySQL Query" required></textarea>
  	  </div>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">SUBMIT</button>
  	  </div>
	</form>	
	
</div>
	
</div>
<script>
	window.onload = () => 
	{
	   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
	   bannerNode.parentNode.removeChild(bannerNode);
	}
</script>
</body>
</html>