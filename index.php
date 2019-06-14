<?php
    session_start();
	if(isset($_GET['id']))
	{
		if($_GET['id']==0)
		{
			unset($_COOKIE['username']);
			unset($_COOKIE['password']);
			setcookie("username",null,-1,"/");
			setcookie("password",null,-1,"/");
			header("Location:/");
			exit();
		}
	}
?>
<?php
	if(isset($_COOKIE["username"]))
	{	
		header("Location:/home");
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
	if(isset($_POST['submit']))
	{
		$uname = $_POST['username'];
		$pass = $_POST['password'];
		$uname = mysqli_real_escape_string($conn, $uname);
		$pass = mysqli_real_escape_string($conn, $pass);
		$sql = "SELECT * FROM `login_details` WHERE `USERNAME` = '$uname' AND `PASSWORD` = '$pass'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		if($rows == 1)
		{
			setcookie("username", $uname, time() + (60*60*24*30), "/");
			setcookie("password", $pass, time() + (60*60*24*30), "/");
			header("Location:/home");
			exit();
		}
		else
		{
		    $_SESSION['log']=1;
		    $_SESSION['fail']=1;
		    $display = "<center><h2 style='color:red;'><i class='far fa-times-circle' style='font-size:5rem;'></i><br>Verification Unsuccessful!!!<br>Wrong Username or Password</h2></center><h4>(i)If you haven't signed yet, Please <a href='/new/signup'>Sign Up</a>.<br>
		                (ii)Or, if you forgot your password, use <a href='/new/f1'>Forgot Password</a></h4>";
		    $_SESSION['display'] = $display;
			header("Location:/new/m");
			exit();
		}
	}
?>
<?php
	$sql = "SELECT * FROM carousel_details WHERE ID = 7";
	$result = mysqli_query($conn, $sql);
	$image = mysqli_fetch_assoc($result);
	$link = $image['IMAGE_LINK'];
	mysqli_close($conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>WELCOME TO BIOLOGIA</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
@charset "utf-8";
@font-face 
{
  	font-family: font;
  	src: url('/fonts/font.ttf');
}
html
{
	height: 100%;
}
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
.centered
{
	top: 50%;
	left: 50%;
	padding: 3rem;
	margin-bottom: 3rem;
}
.container-my
{
	padding: 1rem;
}
.btnn
{
	width: 100%;
}
.shadow-up
{
  	box-shadow: 0 0 2rem rgba(0, 0, 0, 0.5) !important;
}
.x
{
	background-color: rgba(0,0,0,.5) !important;
	color: white;
	z-index: 1;
}
.head
{
	font-family: font;
	color: white;
	font-size: 3.5rem;
	text-shadow: 0px 0px 5px black;
}
.footer 
{
	display: table-row;
	position: absolute;
	bottom: 0px;
	margin-top: 5px;
  	width: 100%;
  	height: auto;
  	background-color: rgba(245, 245, 245, 0.9) !important;
	text-transform: uppercase;
	text-align: center;
	clear: both;
}

@-webkit-keyframes flipInX 
{
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInX 
{
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}
	
.flipInX 
{
  	-webkit-backface-visibility: visible !important;
  	backface-visibility: visible !important;
  	-webkit-animation-name: flipInX;
  	animation-name: flipInX;
	-webkit-animation-delay: 1s;
	animation-duration: 2s;
	-webkit-animation-delay: 1s;
	animation-duration: 2s;
}
</style>
</head>
<body class="bg-dark">
<div class="container justify-content-md-center head col-md-12 col-sm-12 container-my text-uppercase">
	<center><i class="fas fa-user-graduate"></i> Biologia</span></center>
</div>
<div class="container centered container-my">
	<div class="container col-lg-5 border x shadow-up col-md-12 col-sm-12 container-my">
		<div class="container container-my">
			<div class="row justify-content-center">
				<center><h1 class="flipInX"><i class="fas fa-lock" style="font-size:3rem;"></i><br>LOG IN</h1></center>
			</div>
		</div>
		<div class="container container-my">
			<div class="row justify-content-md-center">
				<div class="col align-self-center">
					<form method="post" action="/">
						<div class="form-group">
							<label for="user"><h6>Email:</h6></label>
							<input type="email" class="form-control" id="user" placeholder="Enter Email" name="username" required>
						</div>
						<div class="form-group">
							<label for="password"><h6>Password:</h6></label>
							<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
						</div>
						<br>
						<button type="submit" class="btn btn-primary btnn" name="submit">LOG IN <i class="fas fa-sign-in-alt"></i></button>
						<br><br>
                                    <a class="btn btn-success" href="/new/signup">Sign Up</a>
                                    <a class="btn btn-danger" href="/new/f1" style="float:right;">Forgot Password</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<footer class="footer">
  <div class="container">
	<span class="text-dark"><h6>Designed and maintained by Chandan Kumar (Admin)</h6></span>
  </div>
</footer>
<script>
	window.onload = () => 
	{
	   let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
	   bannerNode.parentNode.removeChild(bannerNode);
	}
</script>
</body>
</html>