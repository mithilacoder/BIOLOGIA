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
		$servername = "localhost";
		$username = "chandan2520";
		$password = "iamtiger#1";
		$dbname = "id9714525_my_database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$files = $_POST['files'];
		$files = explode(", ", $files);
		$i=0;
		while($files[$i])
		{
			$sql = "INSERT INTO `backgrounds`(`IMAGE_LINK`) VALUES ('/images/$files[$i]')";
			mysqli_query($conn, $sql);
			$i++;
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<title>UPDATE CAROUSEL BACKGROUNDS</title>
<link rel="icon" href="/images/icon.gif">
<style>
.btnx
{
    width: 100px;
	margin: 0px 5px;
}
#textarea
	{
		height: 400px;
	}
</style>
</head>
<body class="bg-dark">
<div class="container">
<h3 style="color: white; margin-top: 10px;"><center>UPDATE CAROUSEL BACKGROUNDS</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary btnx">Home</button></a>
	<a href="/admin/carousel_backgrounds" class="btn-link"><button class="btn btn-warning btnx">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success btnx">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger btnx">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/carousel_backgrounds" method="post">
	  <div class="form-group">
			<label for="textarea">File Names (Separated by ", "):</label>
			<textarea class="form-control" id="textarea" name="files" placeholder="Input File Names"></textarea>
  	  </div>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Submit</button>
  	  </div>
	</form>	
</div>
</div>
</body>
</html>