<?php
session_start();
$_SESSION['log']=1;
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
<title>Sign Up</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
@font-face
{
  	font-family: font;
  	src: url('/fonts/font.ttf');
}
.padding
	{
		padding: 15px;
	}
.btn-width
	{
		width: 100%;
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
	mysqli_close($conn);
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
<div class="container"><br>
	<!--<div class="container header">
		<center><i class="fas fa-user-graduate"></i> BIOLOGIA</center>
	</div>--><br>
	<div class="container col-lg-6 border padding container-x rounded">
		<center><h2>SIGN UP</h2></center><br>
		<form action="/new/verify" method="post">
		  <div class="form-group form-row">
			<label for="inputname" class="col-sm-2 col-form-label">Name:</label>
			<div class="col">
			  <input type="text" class="form-control" id="inputname" placeholder="First name" required name="fname">
			</div>
			<div class="col">
			  <input type="text" class="form-control" placeholder="Last name" required name="lname">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="inputEmail" placeholder="Email" required name="email">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password:</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
			</div>
		  </div>
		  <div class="form-group row">
			<label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password:</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required name="conf_password">
				<span id='message'></span>
			</div>
			<small class="form-text col-sm-10" style="color:red;"><br>
			  <u>Note</u>: An OTP will be sent to your given Email ID to verify your ID.
			</small>
		  </div>
		  <div class="form-group row">
			<div class="col-12">
			  <button type="submit" class="btn btn-primary btn-width" name="submit" id="submit">SUBMIT <i class="fas fa-sign-in-alt"></i></button>
			</div>
		  </div>
		</form>
	</div>
	<br><br><br>
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