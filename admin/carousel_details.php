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
		$option = $_POST['option'];
		if($_POST['header']=='x')
			$y = 0;
		else
			$y = 1;
		$header = addslashes($_POST['header']);
		$body = addslashes($_POST['body']);
		if(isset($_POST['emoji']))
			$emoji = $_POST['emoji'];
		else
			$emoji = null;
		if($_POST['upload']==1)
		{
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$target = $document_root."/images/".basename($_FILES['file']['name']);
			$target2 = "/images/".basename($_FILES['file']['name']);
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target))
			{
				echo "<p></p><center><p style='color: white;'>The file <span style='color: red;'>". basename( $_FILES["file"]["name"])."</span> has been uploaded.</p></center>";
				$servername = "localhost";
				$username = "chandan2520";
				$password = "iamtiger#1";
				$dbname = "id9714525_my_database";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if($y == 1)
					$sql = "UPDATE `carousel_details` SET `HEADER`='$header',`BODY`='$body &#$emoji;',`IMAGE_LINK`='$target2' WHERE `ID`= $option";
				else
					$sql = "UPDATE `carousel_details` SET `IMAGE_LINK`='$target2' WHERE `ID`= $option";
				mysqli_query($conn, $sql);
				mysqli_close($conn);
				$bytes = $_FILES['file']['size'];
				if ($bytes >= 1073741824)
				{
					$bytes = number_format($bytes / 1073741824, 2) . ' GB';
				}
				elseif ($bytes >= 1048576)
				{
					$bytes = number_format($bytes / 1048576, 2) . ' MB';
				}
				elseif ($bytes >= 1024)
				{
					$bytes = number_format($bytes / 1024, 2) . ' KB';
				}
				elseif ($bytes > 1)
				{
					$bytes = $bytes . ' bytes';
				}
				elseif ($bytes == 1)
				{
					$bytes = $bytes . ' byte';
				}
				else
				{
					$bytes = '0 bytes';
				}
				echo "<center><p style='color: white;'>File Size: ".$bytes."</p></center>";
			}
			else 
			{
				echo "Sorry, there was an error uploading your file.";
			}
		}
		else
		{
			$servername = "localhost";
			$username = "chandan2520";
			$password = "iamtiger#1";
			$dbname = "id9714525_my_database";
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$sql = "UPDATE `carousel_details` SET `HEADER`='$header',`BODY`='$body &#$emoji;' WHERE `ID`= $option";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<title>UPDATE CAROUSEL DETAILS</title>
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
<h3 style="color: white; margin-top: 10px;"><center>UPDATE CAROUSELS AND LOG-IN BACKGROUND</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
	<a href="/admin/carousel_details" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/carousel_details" enctype="multipart/form-data" method="post">
	  <div class="form-group">
		<select class="custom-select" name="option">
		  <option value="">Select Carousel Number</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		  <option value="6">6</option>
		  <option value="7">Log In Background</option>
		</select>
	  </div>
	  <div class="form-group">
		<label for="header">HEADER TEXT:</label>
		<input type="text" class="form-control" name="header" id="header" placeholder="Input Header Text">
		  <small id="emailHelp" class="form-text text-muted">Type "x" if you want to change only background.</small>
	  </div>
	  <div class="form-group">
			<label for="textarea">BODY TEXT:</label>
			<textarea class="form-control" id="textarea" name="body" placeholder="Input Body Text"></textarea>
  	  </div>
	  <div id="x" style="overflow-y: scroll; width: inherit; height: 200px; margin-bottom: 10px; padding: 5px;" class="border rounded form-group">
		
  	  </div>
	  <div class="form-group">
		<select class="custom-select" name="upload">
		  <option value="">Upload New Image (Yes/No):</option>
		  <option value="1">Yes</option>
		  <option value="0">No</option>
		</select>
	  </div>
	  <div class="custom-file">
		  <input type="file" class="custom-file-input" id="customFile" name="file">
		  <label class="custom-file-label" for="customFile">Choose Image File</label>
	  </div><br>
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