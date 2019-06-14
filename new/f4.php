<?php
    session_start();
	if(!isset($_SESSION['log']))
	{
		header("Location:/");
		exit();
	}
	if(!isset($_SESSION['ok']))
	{
		exit();
	}
?>
<?php
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<?php
	if(isset($_POST['submitoption']))
	{
		$option = $_POST['option'];
		$email = $_SESSION['email'];
		if($option == 1)
		{
			$sql = "SELECT * FROM login_details WHERE USERNAME = '$email'";
			$result = mysqli_query($conn,$sql);
			$pass = mysqli_fetch_assoc($result);
			$pass = $pass['PASSWORD'];
			$_SESSION['action'] = 1;
			$_SESSION['pass'] = $pass;
			header("Location:/new/f5");
			exit();
		}
	}
?>
<?php
	if(isset($_POST['submitpass']))
	{
		$email = $_SESSION['email'];
		$pass = $_POST['password'];
		$sql = "UPDATE `login_details` SET `PASSWORD`='$pass' WHERE USERNAME = '$email'";
		mysqli_query($conn,$sql);
		$_SESSION['action'] = 2;
		$_SESSION['pass'] = $pass;
		header("Location:/new/f5");
		exit();
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>New Password</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
.padding
	{
		padding: 15px;
	}
.btn-width
	{
		width: 100%;
		align-items: center;
	}
html
{
	height: 100%;
}
<?php
	$sql = "SELECT * FROM carousel_details WHERE ID = 7";
	$result = mysqli_query($conn, $sql);
	$image = mysqli_fetch_assoc($result);
	$link = $image['IMAGE_LINK'];
?>
body
{
	background-image: url('<?php echo $link;?>'); 
	height: 100%;
	min-height: 100%;
	width:100%;
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment:fixed;
	background-size: cover;
	position: relative;
	top: 0px;
	bottom: 0px;
	display: table;
}
.container-x
	{
		background-color: rgba(0,0,0,.5) !important;
	}
.header
	{
		font-family: font;
		font-size: 3.5rem;
		text-shadow: 0px 0px 5px black;
	}
</style>
</head>
<body class="text-light">
<div class="container"><br><br>
	<div class="container col-lg-4 border padding container-x rounded">
		<center><h2>ENTER NEW PASSWORD:</h2></center><br>
		<form action="/new/f4" method="post">
		  <div class="form-group row">
			<div class="col-sm-12">
			  <input type="password" class="form-control" id="password" placeholder="New Password" required name="password">
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-12">
			  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required name="conf_password">
				<span id='message'></span>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-12">
			  <button type="submit" class="btn btn-primary btn-width" name="submitpass" id="submit">SUBMIT <i class="fas fa-sign-in-alt"></i></button>
			</div>
		  </div>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$('#confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
		$('#message').html('Matched').css('color', 'green');
	  } else 
		$('#message').html('Not Matching').css('color', 'red');
	});
	$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() != $('#confirm_password').val()) {
		$('#submit').attr('disabled', true);
	  } else 
		$('#submit').attr('disabled', false);
	});
</script>
</body>
</html>
<?php
mysqli_close($conn);
?>