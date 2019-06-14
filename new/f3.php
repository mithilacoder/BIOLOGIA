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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Choose Option</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
		<center><h2>CHOOSE OPTION:</h2></center><br>
		<form action="/new/f4" method="post">
		  	<div class="form-check">
			  <input class="form-check-input" type="radio" name="option" id="oldpass" value="1" checked>
			  <label class="form-check-label" for="oldpass">
				Retrieve your old password
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="option" id="newpass" value="2">
			  <label class="form-check-label" for="newpass">
				Reset your password
			  </label>
			</div><br>
		  <div class="form-group row">
			<div class="col-12">
			  <button type="submit" class="btn btn-primary btn-width" name="submitoption" id="submitoption">SUBMIT <i class="fas fa-sign-in-alt"></i></button>
			</div>
		  </div>
		</form>
	</div>
	<br><br><br>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>