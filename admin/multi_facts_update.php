<?php
	if(isset($_POST['submit']))
	{
		$servername = "localhost";
		$username = "chandan2520";
		$password = "iamtiger#1";
		$dbname = "id9714525_my_database";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$header = $_POST['head'];
		$body = $_POST['body'];
		$emoji = $_POST['emoji'];
		$i=0;
		while($header[$i])
		{
			$header[$i] = addslashes($header[$i]);
			$body[$i] = addslashes($body[$i]);
			$sql = "INSERT INTO `facts`(`HEADER`, `BODY`) VALUES ('$header[$i]','$body[$i] &#$emoji[$i];')";
			mysqli_query($conn, $sql);
			$i++;
		}
		mysqli_close($conn);
	}
?>
<!doctype html>
<html style="z-index: 99999999999">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Update Carousel Facts (Multiple)</title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<style>
.head
	{
		margin: 10px;
		width: 300px;
	}
.body
	{
		margin: 10px;
		height: 150px;
		width: 600px;
	}
.emoji
	{
		margin: 10px;
		height: 150px;
		width: 370px;
		overflow: scroll;
		padding: 10px;
	}
.btn
	{
		margin: 10px 0px 20px 0px;
		width: 100%;
	}
</style>
<script>
	
	$(document).ready(function(){
		for(var i=0; i<12; i++){
		for(var y=128512; y<=128591; y++)
		$("#x"+i+"").append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="emoji['+i+']" id="radio" value="'+y+'"><label class="form-check-label" for="radio"><span style="font-size: 22px;">&#'+y+';</span></label></div>');
		
		for(var y=129296; y<=129342; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129488; y<=129535; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128405; y<=128406; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129464; y<=129465; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=129344; y<=129442; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=127904; y<=128334; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128640; y<=128722; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio'><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=127744; y<=127891; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio' ><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		
		for(var y=128500; y<=128510; y++)
		$("#x"+i+"").append("<div class='form-check form-check-inline'><input class='form-check-input' type='radio' name='emoji["+i+"]' id='radio' value='"+y+"'><label class='form-check-label' for='radio' ><span style='font-size: 22px;'>&#"+y+";</span></label></div>");
		}
	});
</script>
</head>
<body class="bg-dark">
<div class="container-fluid">
	<form method="post" action="/admin/multi_facts_update">
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 1">
		<textarea name="body[]" class="body" placeholder="Body 1"></textarea>
		<div  class="border emoji" id="x0"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 2">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x1"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 3">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x2"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 4">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x3"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 5">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x4"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 6">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x5"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 7">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x6"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 8">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x7"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 9">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x8"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 10">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x9"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 11">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x10"></div>
	</div>
	<div class="row">
		<input type="text" name="head[]" class="head" placeholder="Header 12">
		<textarea name="body[]" class="body"></textarea>
		<div  class="border emoji" id="x11"></div>
	</div>
	<button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
	</form>
</div>
</body>
</html>