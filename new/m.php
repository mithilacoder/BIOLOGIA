<?php
    session_start();
	if(!isset($_SESSION['log']))
	{
		header("Location:/");
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
if(isset($_SESSION['fail']))
    header("refresh:6;url=/");
else
	header("refresh:3;url=/");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>OTP Verification</title>
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
		<center><p class="text-danger"><?php echo $_SESSION['display'];?></p></center>
	</div>
	<br><br><br>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>