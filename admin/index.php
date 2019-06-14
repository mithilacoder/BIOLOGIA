<?php
	session_start();
	if(isset($_POST['submit']))
	{
		$servername = "localhost";
		$username = "chandan2520";
		$password = "iamtiger#1";
		$dbname = "id9714525_my_database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$uname = $_POST['username'];
		$pass = $_POST['password'];
		$sql = "SELECT * FROM `admin` WHERE `USERNAME`= '$uname' AND `PASSWORD`='$pass'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_num_rows($result);
		if($row==1)
		{
			$_SESSION['log']=1;
			header("Location:/admin/main");
			exit();
		}
		else
		{
			header("refresh:5;url=/admin/");
			echo "<center><h1 style='color:red;'>WRONG!!!!</h1></center>";
			exit();
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<title>Admin Login</title>
<link rel="icon" href="/images/icon.gif">
</head>
<body class="bg-dark">
<div class="container">
<div class="container col-lg-4 border bg-light text-uppercase rounded" style="padding: 2rem; margin-top: 5rem; margin-bottom: 5rem;">
	<center><h3>Admin Login</h3><span class="badge badge-danger">Restricted Area</span></center><br>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a></center><br>
	<form action="/admin/" method="post">
	  <div class="form-group">
		<label for="uname">Admin Username:</label>
		<input type="text" class="form-control" id="uname" placeholder="Enter Username" name="username">
	  </div>
	  <div class="form-group">
		<label for="pass">Password:</label>
		<input type="password" class="form-control" id="pass" placeholder="Enter Password" name="password">
	  </div><br>
	  <div class="form-group">
	  <button type="submit" class="btn btn-outline-dark" style="width: 100%;" name="submit">Submit <i class="fas fa-sign-in-alt"></i></button>
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
<?php
	session_destroy();
?>
