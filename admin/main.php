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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>ADMIN HOMEPAGE</title>
<link rel="icon" href="/images/icon.gif">
<style>
.btn
{
    width: 100px;
}
</style>
</head>
<body class="bg-dark">

<div class="container">
	<h3 style="color: white; margin-top: 20px;"><center>MENU :</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a></center><br>
	<center><a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
	<div class="container col-lg-5 bg-light rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
		<div class="list-group">
		  <a href="/admin/get_users_details" target="_blank" class="list-group-item list-group-item-action">FETCH <b>VISITED USERS</b> DETAILS</a>
		  <a href="/admin/get_login_details" target="_blank" class="list-group-item list-group-item-action">LIST OF <b>CURRENT USERS</b></a>
		  <a href="/admin/get_page_details" target="_blank" class="list-group-item list-group-item-action">FETCH <b>ALL PAGES</b></a>
		  <a href="/admin/get_carousel_details" target="_blank" class="list-group-item list-group-item-action">FETCH <b>CURRENT CAROUSELS</b> DATA</a>
		  <a href="/admin/get_carousel_facts" target="_blank" class="list-group-item list-group-item-action">FETCH <b>ALL CAROUSELS FACTS</b></a>
		  <a href="/admin/carousel_details" target="_blank" class="list-group-item list-group-item-action"><b>UPDATE CAROUSELS AND LOGIN BACKGROUND</b></a>
		  <a href="/admin/carousel_backgrounds" target="_blank" class="list-group-item list-group-item-action">UPDATE CAROUSEL BACKGROUNDS</a>
		  <a href="/admin/reload_facts" target="_blank" class="list-group-item list-group-item-action">RELOAD CAROUSEL FACTS</a>
		  <a href="/admin/multi_facts_update" target="_blank" class="list-group-item list-group-item-action">RELOAD CAROUSEL FACTS (<b>Multiple</b>)</a>
		  <a href="/admin/login_details" target="_blank" class="list-group-item list-group-item-action">ADD, REMOVE, OR UPDATE USER</a>
		  <a href="/admin/page_details" target="_blank" class="list-group-item list-group-item-action"><b>ADD NEW PAGE (EXP/NOTE)</b></a>
		  <a href="/admin/page_visibility" target="_blank" class="list-group-item list-group-item-action"><b>UPDATE VISIBILITY</b> TO USERS</a>
		  <a href="/admin/manual_query" target="_blank" class="list-group-item list-group-item-action">PERFORM <b>MANUAL QUERY</b></a>
		  <a href="/admin/email" target="_blank" class="list-group-item list-group-item-action"><b>SEND EMAIL</b></a>
		  <a href="http://newbiologia.000webhostapp.com/admin/email.php" target="_blank" class="list-group-item list-group-item-action">SEND EMAIL (000webhost.com)</a>
		  
		</div>
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