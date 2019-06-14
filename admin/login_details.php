<?php
	session_start();
	if(!isset($_SESSION['log']))
	{
		header("Location:/admin/");
		exit();
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ADD, REMOVE OR UPDATE USER LOGIN DETAIL</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="/js/jquery-3.3.1.slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$("#insert").hide();
		$("#remove").hide();
		$("#display").hide();
		$("#show_add").click(function(){
			
			$("#insert").toggle();
		});
		$("#remove_user").click(function(){
			
			$("#remove").toggle();
		});
		$("#show_curr").click(function(){
			
			$("#display").toggle();
		});
		
	});
</script>

<style>
.btn
{
    width: 100px;
	margin: 0px 5px;
}
</style>
</head>
<?php
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if($id == 1)
		{
		    $fname = $_POST['new_fname'];
		    $lname = $_POST['new_lname'];
			$uname = $_POST['new_email'];
			$pass = $_POST['new_password'];
			if(isset($uname) and isset($pass))
			{
				$uname = mysqli_real_escape_string($conn, $uname);
				$pass = mysqli_real_escape_string($conn, $pass);
				$sql = "INSERT INTO `login_details`(`FIRST_NAME`, `LAST_NAME`, `USERNAME`, `PASSWORD`) VALUES ('$fname', '$lname', '$uname','$pass')";
				mysqli_query($conn, $sql);
			}
		}
		else if($id == 2)
		{
			$uname = $_POST['delete_user'];
			$uname = mysqli_real_escape_string($conn, $uname);
			$sql = "DELETE FROM `login_details` WHERE `USERNAME`= '$uname'";
			mysqli_query($conn, $sql);
		}
		echo '<script type="text/javascript">
					   window.location = "/admin/login_details";
				  </script>';
	}
	
?>
<body class="bg-dark" style="padding-top: 5rem;">
<div class="container">
	<center><button class="btn btn-success btn-sm" id="show_add" style="width:250px;"><h3>ADD NEW USER</h3></button></center><br>
	
	<div class="container col-lg-4 my-5 bg-light" id="insert" style="padding: 2rem;">
		<center><h3>ADD NEW USER</h3></center><br>
		<form action="/admin/login_details?id=1" method="post">
		    <div class="form-group">
				<label for="fname">First Name:</label>
				<input type="text" class="form-control" id="fname" placeholder="Enter first name" name="new_fname">
			</div>
			<div class="form-group">
				<label for="lname">Last Name:</label>
				<input type="text" class="form-control" id="lname" placeholder="Enter last name" name="new_lname">
			</div>
			<div class="form-group">
				<label for="uname">Username (Email):</label>
				<input type="email" class="form-control" id="uname" placeholder="Enter email" name="new_email">
			</div>
			<div class="form-group">
				<label for="pass">Password:</label>
				<input type="password" class="form-control" id="pass" placeholder="Enter password" name="new_password">
			</div><br>
			<div class="form-group">
			  <button type="submit" class="btn btn-outline-primary" style="width: 100%;">Submit <i class="fas fa-sign-in-alt"></i></button>
			</div>
		</form>
	</div>
	<center><button class="btn btn-danger" id="remove_user" style="width:250px;"><h3>REMOVE USER</h3></button></center><br>
	<div class="container col-lg-4 my-5 bg-light" id="remove" style="padding: 2rem;">
		<center><h3>REMOVE USER</h3></center><br>
		<form action="/admin/login_details?id=2" method="post">
			<div class="form-group">
				<label for="uname">Username (Email):</label>
				<input type="email" class="form-control" id="uname" placeholder="Enter Email" name="delete_user">
			</div>
			<br>
			<div class="form-group">
			  <button type="submit" class="btn btn-outline-primary" style="width: 100%;">Submit <i class="fas fa-sign-in-alt"></i></button>
			</div>
		</form>
	</div>
	<center><button class="btn btn-primary" id="show_curr" style="width:250px;"><h3>CURRENT USERS</h3></button></center><br>
	
	<div class="container col-lg-5 my-5 bg-light" id="display" style="padding: 1rem; overflow: scroll;">
		<center><h3>CURRENT USERS</h3></center><br>
		<table class="table table-striped table-dark table-responsive-lg">
		  <thead>
			<tr>
			  <th scope="col">FIRST_NAME</th>
			  <th scope="col">LAST_NAME</th>
			  <th scope="col">USERNAME (Email)</th>
			  <th scope="col">PASSWORD</th>
			</tr>
		  </thead>
		  <tbody>
			  <?php
					$sql = "SELECT * FROM login_details";
					$result = mysqli_query($conn, $sql);
			  		mysqli_close($conn);
					while($row = mysqli_fetch_row($result))
					{
						echo '<tr>
								  <td>'.$row[1].'</td>
								  <td>'.$row[2].'</td>
								  <td>'.$row[3].'</td>
								  <td>'.$row[4].'</td>
								</tr>';
					}
			?>
		  </tbody>
		</table>
		
		
	</div>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center><br>
<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
<a href="/admin/login_details" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center>
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