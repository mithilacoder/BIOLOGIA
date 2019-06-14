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
		$to = $_POST['remail'];
		$from = $_POST['semail'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		require "PHPMailerAutoload.php";
    	$mail = new PHPMailer;
    	$mail->IsSMTP();
    	$mail->Host = "mail.biologia.cu.ma";
    	$mail->Port = 587; 
    	$mail->SMTPAuth = true;
    	$mail->SMTPSecure = "tls";
    	$mail->Username = "admin@biologia.cu.ma";
    	$mail->Password = "iamtiger#1";
    	$mail->SetFrom($from);
    	$mail->AddAddress($to);
    	$mail->IsHTML(true);
    	$mail->Subject = $subject;
    	$content = $message;
    	$mail->Body = $content;
    	if(!$mail->Send())
    	{
    		echo "<center>Mail not sent.<br>Reason: ". $mailer->ErrorInfo."</center>";
    	}
    	else
    	{
    		echo "<center>Message sent successfully.</center>";
    	}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Send Email</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
<h3 style="color: white; margin-top: 10px;"><center>SEND EMAIL</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primar">Home</button></a>
	<a href="/admin/email" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/email" enctype="multipart/form-data" method="post">
	  <div class="form-group">
		<label for="to">SEND TO:</label>
		<input type="email" class="form-control" name="remail" id="to" placeholder="Send To">
	  </div>
	  <div class="form-group">
		<label for="from">SEND FROM:</label>
		<input type="email" class="form-control" name="semail" id="from" placeholder="Send From" value="admin@biologia.cu.ma">
	  </div>
	  <div class="form-group">
		<label for="subject">SUBJECT:</label>
		<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject...">
	  </div>
	  <div class="form-group">
			<label for="textarea">MESSAGE:</label>
			<textarea class="form-control" id="textarea" name="message" placeholder="Message..."></textarea>
  	  </div>
	  <br>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Submit</button>
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