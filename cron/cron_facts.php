<?php
$servername = "localhost";
$username = "chandan2520";
$password = "iamtiger#1";
$dbname = "id9714525_my_database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM facts";
$all_facts = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($all_facts);
if($rows >= 6)
{
	$j=1;
	while($j<=6)
	{
		$fact = mysqli_fetch_row($all_facts);
		$head = $fact[1];
		$body = $fact[2];
		$head = addslashes($head);
		$body = addslashes($body);
		$sql = "UPDATE `carousel_details` SET `HEADER`='$head',`BODY`='$body' WHERE `ID`= $j";
		mysqli_query($conn, $sql);
		$sql = "DELETE FROM `facts` WHERE ID = $fact[0]";
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
	$subject = "RELOAD CAROUSEL FACTS";
	$mail->Subject = $subject;
	$content = "<center><strong>Carousel facts are less than 6. Please reload it.</strong></center>";
	$mail->Body = $content;
	$mail->send();
}
mysqli_close($conn);
?>