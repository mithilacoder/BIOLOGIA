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
	if(isset($_POST['submitemail']))
	{
		$email = $_POST['email'];
		$sql = "SELECT * FROM login_details WHERE USERNAME = '$email'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if($count == 0)
		{
			echo "<h2><center>This Email doesn't exist.<br>Please <a href='/new/signup'>Sign Up</a></center></h2>";
			exit();
		}
		else
		{
			$_SESSION['email'] = $email;
			$otp = rand(100000,999999);
			$_SESSION['otp'] = $otp;
			require "PHPMailerAutoload.php";
			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587; 
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "tls";
			$mail->Username = "otp.biologia@gmail.com";
			$mail->Password = "iamtiger#1";
			$mail->SetFrom("otp@biologia.cu.ma", "OTP from BIOLOGIA");
			$mail->AddAddress($email);
			$mail->IsHTML(true);
			$subject = "OTP";
			$mail->Subject = $subject;
			$content = "<center><strong>Your OTP is: ".$otp."</strong></center>";
			$mail->Body = $content;
			if(!$mail->Send())
			{
			  	$message = "OPT sending is unsuccessful. Please! try again";
			  	$color = "text-danger";
			}
			else
			{
				$message = "OTP is successfully sent to your given email...";
			  	$color = "text-success";
			}
		}
	}
?>
<?php
	if(isset($_POST['submitotp']))
	{
		$otpx = $_POST['otp'];
		if($otpx == $_SESSION['otp'])
		{
			header("Location:/new/f3");
			$mess = "";
			$_SESSION['ok']=1;
			exit();
		}
		else
		{
			$mess = "Verification Unsuccessful<br>Re-enter the OTP";
		}
	}
?>
<?php
if(isset($_GET['otp']))
{
	require "PHPMailerAutoload.php";
	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Username = "otp.biologia@gmail.com";
	$mail->Password = "iamtiger#1";
	$mail->SetFrom("otp@biologia.cu.ma", "OTP from BIOLOGIA");
	$mail->AddAddress($_SESSION['email']);
	$mail->IsHTML(true);
	$subject = "OTP";
	$mail->Subject = $subject;
	$otp = $_SESSION['otp'];
	$content = "<center><strong>Your OTP is: ".$otp."</strong></center>";
	$mail->Body = $content;
	if(!$mail->Send())
	{
		$message = "OPT sending is unsuccessful. Please! try again";
		$color = "text-danger";
	}
	else
	{
		$message = "OTP is successfully resent to your given email...";
		$color = "text-success";
	}
}
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
		<center><small id="message" class="<?php echo $color;?>"><?php echo $message;?></small></center>
		<center><p class="text-danger"><?php echo $mess;?></p></center>
		<center><h2>TO VERIFY YOUR EMAIL ID<br>ENTER OTP:</h2></center><br>
		<form action="/new/f2" method="post">
		  <div class="form-group form-row">
			<div class="col">
			  <input type="text" class="form-control" id="inputotp" placeholder="Enter OTP" required name="otp">
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-12">
			  Haven't received yet? <a href="/new/f2?otp=resend" name="resend" id="resend" class="alert-link text-danger">Resend OTP</a>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-12">
			  <button type="submit" class="btn btn-primary btn-width" name="submitotp" id="submit">SUBMIT <i class="fas fa-sign-in-alt"></i></button>
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