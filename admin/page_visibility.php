<?php
	session_start();
	if(!isset($_SESSION['log']))
	{
		header("Location:/admin/");
		exit();
	}
$servername = "localhost";
$username = "chandan2520";
$password = "iamtiger#1";
$dbname = "id9714525_my_database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<?php
	if(isset($_POST['submit']))
	{
		$users = $_POST['users'];
		$users = implode(", ",$users);
		$id = $_POST['pages'];
		$i=0;
		while($id[$i])
		{
			$sql = "UPDATE `page_details` SET `VISIBILITY`='$users' WHERE `ID`= $id[$i]";
			$i++;
			mysqli_query($conn, $sql);
		}
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>UPDATE VISIBILITY</title>
<link rel="icon" href="/images/icon.gif">
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
<h3 style="color: white; margin-top: 10px;"><center>UPDATE VISIBILITY OF PAGE</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
	<a href="/admin/page_visibility" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/page_visibility" method="post">
	  Choose Pages:
	  <div class="form-group border rounded" style="height: 400px; overflow: scroll; padding: 10px;">
		
<?php
  $sql = "SELECT * FROM page_details WHERE ID > 9";
  $pages = mysqli_query($conn, $sql);
  while($page=mysqli_fetch_row($pages))
  {
	  echo '<div class="form-check">
			  <label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="pages[]" value="'.$page[0].'"><strong>'.$page[1].'</strong> ('.$page[8].')
			  </label>
			</div>
			';
  }
?>
	  </div>
	  Select Users:
	  <div class="form-group border rounded" style="height: 200px; overflow: scroll; padding: 10px;">
		<div class="form-check">
		  <label class="form-check-label">
			<input type="checkbox" class="form-check-input" name="users[]" value="all">All Users
		  </label>
		</div>
<?php
  $sql = "SELECT * FROM login_details";
  $result = mysqli_query($conn, $sql);
  while($row=mysqli_fetch_row($result))
  {
	  echo '<div class="form-check">
			  <label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="users[]" value="'.$row[3].'">'.$row[1].' ('.$row[3].')
			  </label>
			</div>
			';
  }
?>
	  </div>
	  <br>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">SUBMIT</button>
  	  </div>
	</form>	
</div>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>