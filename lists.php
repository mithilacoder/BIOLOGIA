<?php
	if(!isset($_COOKIE["username"]))
	{	
		header("Location:/");
	 	exit();
	}
	if(!isset($_GET['id']))
	{
		header("Location:/home");
	 	exit();
	}
?>
<?php
function get_ip_address() 
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) 
	{
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	{
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) 
		{
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) 
			{
                if (validate_ip($ip))
                    return $ip;
            }
        } 
		else 
		{
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    return $_SERVER['REMOTE_ADDR'];
}
function validate_ip($ip) 
{
    if (strtolower($ip) === 'unknown')
        return false;

    $ip = ip2long($ip);

    if ($ip !== false && $ip !== -1) 
	{
        $ip = sprintf('%u', $ip);
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
    }
    return true;
}

	$ip = get_ip_address();
	$TOKEN = '998dbfbfd07862';
	$url = 'https://ipinfo.io/'.$ip.'?token='.$TOKEN;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$data = curl_exec($ch);
	curl_close($ch);
	$info = json_decode($data, TRUE);
	$user_ip = $info['ip'];
	$city = $info['city'];
	$region = $info['region'];
	$country = $info['country'];
	$loc = $info['loc'];
	$postal = $info['postal'];
	$org = $info['org'];
	$port = $_SERVER['REMOTE_PORT'];
	$uname = $_COOKIE['username'];
	$pass = $_COOKIE['password'];
	date_default_timezone_set("Asia/Kolkata");
	$time = date("h:i:s A");
	$date = date("d-m-Y");
	$day = date("l");
	$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$browser = $_SERVER['HTTP_USER_AGENT'];
	$servername = "localhost";
	$username = "chandan2520";
	$password = "iamtiger#1";
	$dbname = "id9714525_my_database";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<?php
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "SELECT TITLE_OF_PAGE FROM page_details WHERE PAGE = 'homepage' AND CODE = '$id'";
	$result = mysqli_query($conn, $sql);
	$title = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM page_details WHERE PAGE = 'list_page' AND CODE = '$id' ORDER BY ID ASC";
	$result2 = mysqli_query($conn, $sql);
	$titlee = $title['TITLE_OF_PAGE'];
	$sql = "INSERT INTO `user_details`(`DAY`, `DATE`, `TIME`, `USERNAME`, `PASSWORD`, `IP_ADDRESS`, `PORT`, `CITY`, `REGION`, `COUNTRY`, `LATITUDE_LONGITUDE`, `POSTAL_CODE`, `TELECOM_OPERATOR`, `SUBJECT`, `TITLE_OF_PAGE`, `BROWSER`, `LINK`) VALUES ('$day','$date','$time','$uname','$pass','$user_ip','$port', '$city', '$region', '$country', '$loc', '$postal', '$org', '$titlee','LIST PAGE','$browser','$link')";
	mysqli_query($conn,$sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $title['TITLE_OF_PAGE']; ?></title>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
    $rows = 0;
    while($row = mysqli_fetch_row($result2))
    {
    	if($row[8]=='all')
    	{
    		$rows++;
    	}
    	else
    	{
    		$users = explode(", ",$row[8]);
    		$user = $_COOKIE['username'];
    		if(in_array($user,$users))
    		{
    			$rows++;
    		}
    	}
    }
    $sql = "SELECT * FROM page_details WHERE PAGE = 'list_page' AND CODE = '$id' ORDER BY ID ASC";
	$result2 = mysqli_query($conn, $sql);
	if($rows == 0)
	{
		echo "<script>";
		echo "$(document).ready(function(){";
		echo '$("#list").append("';
		echo "<a href='#' class= 'list-group-item list-group-item-action disabled'>No Item";
		echo '</a>")});';
		echo "</script>";
	}
	else
	{
		while($row = mysqli_fetch_row($result2))
		{
			if($row[8]=='all')
			{
			    $headers = explode(", ",$row[1]);
				echo "<script>";
				echo "$(document).ready(function(){";
				echo '$("#list").append("';
				echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action'><i class='fab fa-hotjar text-danger'></i> <span style='color:black;'><strong>".$headers[0]."</strong> ".$headers[1];
				echo '</span></a>")});';
				echo "</script>";
			}
			else
			{
				$users = explode(", ",$row[8]);
				$user = $_COOKIE['username'];
				if(in_array($user,$users))
				{
				    $headers = explode(", ",$row[1]);
					echo "<script>";
					echo "$(document).ready(function(){";
					echo '$("#list").append("';
					echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action'><i class='fab fa-hotjar text-danger'></i> <span style='color:black;'><strong>".$headers[0]."</strong> ".$headers[1];
					echo '</span></a>")});';
					echo "</script>";
				}
			}
		}
	}
?>
<?php
	$sql = "SELECT * FROM page_details WHERE ID = 9";
	$R = mysqli_query($conn, $sql);
	$X = mysqli_fetch_assoc($R);
	$OE = $X['TITLE_OF_PAGE'];
	mysqli_close($conn);
?>
<style>
.dropdown-item
	{
		min-width: 320px;
	}
#logout
{
    color:white;
}
nav
{
    box-shadow: 0px 2px 5px grey;
}
</style>
</head>

<body class="" style="background-color:#090a12;">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-uppercase font-weight-bold" href="/home">
	  <i class="fas fa-user-graduate fa-lg"></i> biologia</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-uppercase font-weight-bold" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item  align-self-center">
        <a class="nav-link" href="/home"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item dropdown align-self-center">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-flask"></i> Experiments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-wrap" href="/list/lab01">Immunology Lab</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/lab02">Bioprocess Technology Lab</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/lab03">Unit Operations of CE Lab - II</a>
        </div>
      </li>
	  <li class="nav-item dropdown  align-self-center">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-book"></i> Notes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-wrap" href="/list/sub01">Biochemical Reaction Engineering and Bioreactor Design</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/sub02">Cell and Tissue Culture</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/sub03">Bioseparation and Biochemical Analysis</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/sub04">Unit Operations of CE-II</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-wrap" href="/list/sub05"><?php echo $OE;?></a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
		<li class="nav-item active">
			<a class="nav-link  btn btn-danger my-2 my-sm-0 align-self-center" href="/0" id="logout">Log Out <i class="fas fa-sign-out-alt"></i></a>
		</li>
	</ul>
  </div>
</nav>
<div id="parent" class="container" style="margin-bottom: 100px; word-wrap: break-word;">
		<center><h2 class="text-uppercase" style="color: white;"><?php echo $title['TITLE_OF_PAGE']; ?></h2></center>
		<div class="list-group" id="list">
		  
		</div>
</div>
<div class="text-uppercase text-center card-footer bg-light" style="position: fixed; bottom: 0px; width: 100%; font-size: 0.7rem; z-index: 99999999999">
	<center>
	For feedback or if you find any problem<br>
	<a href="mailto:ch.kr.email@gmail.com" class="alert-link badge badge-primary"><i class="fas fa-envelope"></i> Email Me</a></center>
</div>	
</body>
</html>
