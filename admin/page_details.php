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
		$title = addslashes($_POST['title']);
		$subject = $_POST['subject'];
		$link = addslashes($_POST['link']);
		$download = $_POST['download'];
		$upload = $_POST['upload'];
		$link_type = $_POST['link_type'];
		if($upload == 1)
		{
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$target = $document_root."/downloads/".basename($_FILES['file']['name']);
			$target2 = "/downloads/".basename($_FILES['file']['name']);
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target))
			{
				echo "<p></p><center><p style='color: white;'>The file <span style='color: red;'>". basename( $_FILES["file"]["name"])."</span> has been uploaded.</p></center>";
				if($link_type == 1)
					$link = "https://drive.google.com/file/d/".$link."/preview";
				$sql = "INSERT INTO `page_details`(`TITLE_OF_PAGE`, `PAGE`, `PAGE_TO_OPEN`, `CODE`, `LINK`, `DOWNLOAD`, `DOWNLOAD_LINK`, `VISIBILITY`) VALUES ('$title','list_page','viewer','$subject','$link', $download, '$target2', '$users')";
				mysqli_query($conn, $sql);
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
		else if($upload == 0)
		{
			if($link_type == 2)
				$sql = "INSERT INTO `page_details`(`TITLE_OF_PAGE`, `PAGE`, `PAGE_TO_OPEN`, `CODE`, `LINK`, `DOWNLOAD`, `DOWNLOAD_LINK`, `VISIBILITY`) VALUES ('$title','list_page','viewer','$subject','$link', 0,'', '$users')";
			else if($link_type == 1)
			{
				$down_link = "https://drive.google.com/uc?export=download&id=".$link;
				$link = "https://drive.google.com/file/d/".$link."/preview";
				$sql = "INSERT INTO `page_details`(`TITLE_OF_PAGE`, `PAGE`, `PAGE_TO_OPEN`, `CODE`, `LINK`, `DOWNLOAD`, `DOWNLOAD_LINK`, `VISIBILITY`) VALUES ('$title','list_page','viewer','$subject','$link', '$download','$down_link', '$users')";
			}
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
<title>ADD NEW PAGE</title>
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
<h3 style="color: white; margin-top: 10px;"><center>ADD NEW PAGE</center></h3>
	<center><a href="/home" class="btn-link"><button class="btn btn-primary">Home</button></a>
	<a href="/admin/page_details" class="btn-link"><button class="btn btn-warning">Refresh</button></a></center><br>
	<center><a href="/admin/main" class="btn-link"><button class="btn btn-success">Main</button></a>
<a href="/admin/" class="btn-link"><button class="btn btn-danger">Log Out</button></a></center>
<div class="container bg-light col-lg-6 rounded" style="padding-top: 1rem; padding-bottom: 1rem; margin-top: 2rem; margin-bottom: 5rem;">
	<form action="/admin/page_details" enctype="multipart/form-data" method="post">
	  <div class="form-group">
		<label for="header">EXP/NOTE TITLE:</label>
		<input type="text" class="form-control" name="title" id="header" placeholder="Enter Title" required>
		<small id="help" class="form-text text-muted">
			Use <kbd>,space</kbd> to separate between <kbd>Main Title</kbd> & <kbd>Sub Title</kbd>
		  </small>
	  </div>
	  <div class="form-group">
		<select class="custom-select" name="subject" required>
		  <option value="">Choose Subject/Lab</option>
		  <option value="lab01">Immunology Laboratory</option>
		  <option value="lab02">Bioprocess Technology Laboratory</option>
		  <option value="lab03">Unit Operations of Chemical Engineering Laboratory- II</option>
		  <option value="sub01">Biochemical Reaction Engineering and Bioreactor Design</option>
		  <option value="sub02">Cell and Tissue Culture</option>
		  <option value="sub03">Bioseparartion and Biochemical Analysis</option>
		  <option value="sub04">Unit Operations of Chemical Engineering-II</option>
		  <option value="sub05">Open Elective - 2</option>
		  <option value="misc">Miscellaneous</option>
		</select>
	  </div>
	  Select Users:
	  <div class="form-group border rounded" style="height: 150px; overflow: scroll; padding: 10px;">
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
	  <div class="form-group">
		<select class="custom-select" name="link_type">
		  <option value="">Link Type: </option>
		  <option value="1">Google Drive</option>
		  <option value="2">Scribd</option>
		</select>
	  </div>
	  <div class="form-group">
			<label for="textarea">LINK:</label>
			<textarea class="form-control" id="textarea" name="link" placeholder="Enter Link" required rows="10"></textarea>
		<small id="help" class="form-text text-muted">
			In case of Google Drive link, enter only ID of file.
		  </small>
  	  </div>
	  <div class="form-group">
		<select class="custom-select" name="download">
		  <option value="">Download Button: </option>
		  <option value="1">YES</option>
		  <option value="0">NO</option>
		</select>
	  </div>
	  <div class="form-group">
		<select class="custom-select" name="upload">
		  <option value="">Upload File (Yes/No): </option>
		  <option value="1">YES</option>
		  <option value="0">NO</option>
		</select>
		<small id="help" class="form-text text-muted">
			In case of Google Drive link, there is no need to upload file.<br>
			If you upload the file, then uploaded file will be downloaded.
		  </small>
	  </div>
	  <div class="custom-file">
		  <input type="file" class="custom-file-input" id="customFile" name="file">
		  <label class="custom-file-label" for="customFile">Choose File</label>
	  </div><br>
	  <div class="form-group" style="margin-top: 25px; width: 100%;">
		<button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">SUBMIT</button>
  	  </div>
	</form>	
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>
<?php
mysqli_close($conn);
?>