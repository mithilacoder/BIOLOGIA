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
		$header = addslashes($_POST['header']);
		$body = addslashes($_POST['body']);
		$emoji = $_POST['emoji'];
		$servername = "localhost";
		$username = "chandan2520";
		$password = "iamtiger#1";
		$dbname = "id9714525_my_database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$sql = "INSERT INTO `facts`(`HEADER`, `BODY`) VALUES ('$header','$body &#$emoji;')";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		header("Location:/admin/reload_facts");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<title>RELOAD CAROUSEL FACTS</title>
<link rel="icon" href="/images/icon.gif">
	
<script>
	
	$(document).ready(function(){
		
		
		for(var y=128512; y<=128591; y++)
		$("#x").append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="emoji" id="radio" value="'+y+'"><label class="form-check-label" for="radio"><span style="font-size: 22px;">&#'+y+';</span></label></div>');
		
		for(var y=129296; y<=129342; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129488; y<=129535; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128405; y<=128406; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129464; y<=129465; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129344; y<=129442; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=127904; y<=128334; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128640; y<=128722; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=127744; y<=127891; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio' ><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128500; y<=128510; y++)
		$("#x").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji' id='radio' value='"+y+"'><label class='form-check-label' for='radio' ><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
	});
</script>
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
<h3 style="color: white; margin-top: 10px;"><center>RELOAD FACTS</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
	<a href="/admin/reload_facts" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/reload_facts" enctype="multipart/form-data" method="post">
	  <div class="form-group">
		<label for="header">HEADER TEXT:</label>
		<input type="text" class="form-control" name="header" id="header" placeholder="Input Header Text">
	  </div>
	  <div class="form-group">
			<label for="textarea">BODY TEXT:</label>
			<textarea class="form-control" id="textarea" name="body" placeholder="Input Body Text"></textarea>
  	  </div>
	  <div id="x" style="overflow-y: scroll; width: inherit; height: 400px; margin-bottom: 10px; padding: 5px;" class="border rounded form-group">
		
  	  </div><br>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Submit</button>
  	  </div>
	</form>	
</div>
</div>
</body>
</html>