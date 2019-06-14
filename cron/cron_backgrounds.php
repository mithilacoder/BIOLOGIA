<?php
$servername = "localhost";
$username = "chandan2520";
$password = "iamtiger#1";
$dbname = "id9714525_my_database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM backgrounds";
$all_backgrounds = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($all_backgrounds);
if($rows >= 6)
{
	$j=1;
	while($j<=6)
	{
		$background = mysqli_fetch_row($all_backgrounds);
		$img_link = $background[1];
		$sql = "UPDATE `carousel_details` SET `IMAGE_LINK`='$img_link' WHERE `ID`= $j";
		mysqli_query($conn, $sql);
		$sql = "DELETE FROM `backgrounds` WHERE ID = $background[0]";
		mysqli_query($conn, $sql);
		$j++;
	}
}
else
{
	//Report to ADMIN through Email
	require "PHPMailerAutoload.php";
	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Username = "otp.biologia@gmail.com";
	$mail->Password = "iamtiger#1";
	$mail->SetFrom("admin@biologia.cu.ma", "BIOLOGIA's CAROUSEL");
	$mail->AddAddress("ch.kr.email@gmail.com");
	$mail->IsHTML(true);
	$subject = "RELOAD CAROUSEL BACKGROUNDS";
	$mail->Subject = $subject;
	$content = "<center><strong>Carousel backgrounds are less than 6. Please reload it.</strong></center>";
	$mail->Body = $content;
	$mail->send();
}
mysqli_close($conn);
?>