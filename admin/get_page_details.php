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
<title>PAGE DETAILS</title>
<link rel="icon" href="/images/icon.gif">
</head>
	
<body class="bg-dark">
<div class="table-responsive" style="font-size: 0.6rem;">
<table class="table table-sm table-bordered table-dark">
  <thead>
    <tr class="bg-danger">
      <th scope="col">ID</th>
      <th scope="col">TITLE_OF_PAGE</th>
      <th scope="col">PAGE</th>
      <th scope="col">PAGE_TO_OPEN</th>
      <th scope="col">CODE</th>
      <th scope="col">LINK</th>
      <th scope="col">DOWNLOAD</th>
      <th scope="col">DOWNLOAD_LINK</th>
      <th scope="col">VISIBILITY</th>
    </tr>
  </thead>
  <tbody>
<?php
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM `page_details` ORDER BY ID ASC";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	while($row = mysqli_fetch_row($result))
	{
		echo '<tr>
				  <th scope="row">'.$row[0].'</th>
				  <td>'.$row[1].'</td>
				  <td>'.$row[2].'</td>
				  <td>'.$row[3].'</td>
				  <td>'.$row[4].'</td>
				  <td>'.$row[5].'</td>
				  <td>'.$row[6].'</td>
				  <td>'.$row[7].'</td>
				  <td>'.$row[8].'</td>
				</tr>';
	}
?>
  
  </tbody>
</table>
</div>
</body>
</html>