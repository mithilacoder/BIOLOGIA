<?php
	if(!isset($_COOKIE["username"]))
	{	
		header("Location:/");
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
	$sql = "INSERT INTO `user_details`(`DAY`, `DATE`, `TIME`, `USERNAME`, `PASSWORD`, `IP_ADDRESS`, `PORT`, `CITY`, `REGION`, `COUNTRY`, `LATITUDE_LONGITUDE`, `POSTAL_CODE`, `TELECOM_OPERATOR`, `SUBJECT`, `TITLE_OF_PAGE`, `BROWSER`, `LINK`) VALUES ('$day','$date','$time','$uname','$pass','$user_ip','$port', '$city', '$region', '$country', '$loc', '$postal', '$org', 'BIOLOGIA','HOMEPAGE','$browser','$link')";
	mysqli_query($conn,$sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>BIOLOGIA Homepage</title>
<style>
@charset "utf-8";
html
{
	margin: 0px;
	height: 100%;	
}
body
{
	margin: 0px;
	height: 100%;
	position: relative;
}
.carousel-container
{
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	z-index: 0;
}
.carousel-view
{
	height: 100vh;
	width: 100vw;
}
.a
{
	height: 300px;
	line-height: 300px;
}
.i
{
	display: block;
}
.data
{
	margin: 96vh 0px 20px 0px;
	height: auto;
}
.main
{
	height: auto;
	padding: 50px;
}
body
	{
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='250' height='30' viewBox='0 0 1000 120'%3E%3Cg fill='none' stroke='%23222' stroke-width='3.6' %3E%3Cpath d='M-500 75c0 0 125-30 250-30S0 75 0 75s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3Cpath d='M-500 45c0 0 125-30 250-30S0 45 0 45s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3Cpath d='M-500 105c0 0 125-30 250-30S0 105 0 105s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3Cpath d='M-500 15c0 0 125-30 250-30S0 15 0 15s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3Cpath d='M-500-15c0 0 125-30 250-30S0-15 0-15s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3Cpath d='M-500 135c0 0 125-30 250-30S0 135 0 135s125 30 250 30s250-30 250-30s125-30 250-30s250 30 250 30s125 30 250 30s250-30 250-30'/%3E%3C/g%3E%3C/svg%3E");
	}
<?php
    $sql_img_link = "SELECT * FROM carousel_details ORDER BY ID ASC";
	$img_links = mysqli_query($conn, $sql_img_link);
	$j=0;
	for($i=0; $i<6; $i++)
	{
		$img_link = mysqli_fetch_row($img_links);
		$links[$j] = $img_link[3];
		$j++;
	}
?>
.car1
	{
		background-image: url("<?php echo $links[0]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
.car2
	{
		background-image: url("<?php echo $links[1]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
.car3
	{
		background-image: url("<?php echo $links[2]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
.car4
	{
		background-image: url("<?php echo $links[3]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
.car5
	{
		background-image: url("<?php echo $links[4]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
.car6
	{
		background-image: url("<?php echo $links[5]?>");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
<link rel="icon" href="/images/icon.gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Mogra&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma&display=swap" rel="stylesheet">
<style>
nav
{
    box-shadow: 0px 2px 5px grey;
}
.carousel-caption
	{
		top: 50%;
		transform: translateY(-50%);
		bottom: initial;
	}
.carousel-caption h5
	{
		font-family: 'Mogra', cursive;
        letter-spacing:1px;
	}
.carousel-caption p
	{
		font-family: 'Mallanna', sans-serif;
		font-size: 1.05rem;
	}
.carousel-item
	{
		-webkit-transform-style: preserve-3d;
		-moz-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
.dropdown-item
	{
		min-width: 320px;
		width: 100%;
	}
.wrapperr 
{
    background-color: rgba(0,0,0,.7);
    border: 7px double rgba(245,245,245,0.55);
    border-radius: 12px;
    margin: auto -10px;
    padding: 20px 5px 20px 5px;
    box-shadow: 0px 0px 2px 3px rgba(245,245,245,0.55);
}
#logout
{
    color:white;
}
</style>
<?php
	$sql = "SELECT * FROM page_details WHERE ID > 9 ORDER BY ID ASC";
	$result = mysqli_query($conn, $sql);
	//$total_rows = mysqli_num_rows($result);
	$total_rows = 0;
	while($row = mysqli_fetch_row($result))
	{
		if($row[8]=='all')
		{
			$total_rows=$total_rows+1;
		}
		else
		{
			$users = explode(", ",$row[8]);
			$user = $_COOKIE['username'];
			if(in_array($user,$users))
			{
				$total_rows=$total_rows+1;
			}
		}
	}
	$result = mysqli_query($conn, $sql);
	if($total_rows== 0)
	{
		echo "<script>";
		echo "$(document).ready(function(){";
		echo '$("#updates").append("';
		echo "<a href='#' class= 'list-group-item list-group-item-action disabled'>No Updates";
		echo '</a>")});';
		echo "</script>";
	}
	else if($total_rows<5)
	{
		$m = $total_rows;
		while($row = mysqli_fetch_row($result))
		{
			if($row[8]=='all')
			{
				echo "<script>";
				echo "$(document).ready(function(){";
				echo '$("#updates").prepend("';
				echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action text-dark'><i class='far fa-fire-alt text-danger font-weight-bolder'></i> ".$row[1]." ";
				if($m <= 2)
				echo "<small><span class='badge badge-danger badge-pill'>NEW</span></small>";
				echo '</a>")});';
				echo "</script>";
				$m--;
			}
			else
			{
				$users = explode(", ",$row[8]);
				$user = $_COOKIE['username'];
				if(in_array($user,$users))
				{
					echo "<script>";
					echo "$(document).ready(function(){";
					echo '$("#updates").prepend("';
					echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action text-dark'><i class='far fa-fire-alt text-danger font-weight-bolder'></i> ".$row[1]." ";
					if($m <= 2)
					echo "<small><span class='badge badge-danger badge-pill'>NEW</span></small>";
					echo '</a>")});';
					echo "</script>";
					$m--;
				}
			}
		}
	}
	else
	{
		$n = $total_rows - 5;
		$m = $total_rows - 3;
		while($row = mysqli_fetch_row($result))
		{
			if($row[8]=='all')
			{
				if($n<=0)
				{
					echo "<script>";
					echo "$(document).ready(function(){";
					echo '$("#updates").prepend("';
					echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action'><i class='far fa-fire-alt text-danger font-weight-bolder'></i> ".$row[1]." ";
					if($m < 0)
					echo "<span class='badge badge-danger badge-pill'>NEW</span>";
					echo '</a>")});';
					echo "</script>";
				}
				$n = $n - 1;
				$m = $m - 1;
			}
			else
			{
				$users = explode(", ",$row[8]);
				$user = $_COOKIE['username'];
				if(in_array($user,$users))
				{
					if($n<=0)
					{
						echo "<script>";
						echo "$(document).ready(function(){";
						echo '$("#updates").prepend("';
						echo "<a href='/view/".$row[0]."' class= 'list-group-item list-group-item-action'><i class='far fa-fire-alt text-danger font-weight-bolder'></i> ".$row[1]." ";
						if($m < 0)
						echo "<span class='badge badge-danger badge-pill'>NEW</span>";
						echo '</a>")});';
						echo "</script>";
					}
					$n = $n - 1;
					$m = $m - 1;
				}
			}
		}
	}
	$sql = "SELECT * FROM carousel_details ORDER BY ID ASC";
	$result = mysqli_query($conn, $sql);
	for($i=0; $i<6; $i++)
	{
		$row = mysqli_fetch_row($result);
		for($j=0;$j<2;$j++)
		{
			$car[$i][$j] = $row[$j+1];
		}
	}
?>
<?php
	$sql = "SELECT * FROM page_details WHERE CODE='misc' ORDER BY ID ASC";
	$result = mysqli_query($conn, $sql);
	//$count = mysqli_num_rows($result);
	while($roww = mysqli_fetch_row($result))
	{
		if($roww[8]=='all')
		{
			$count=$count+1;
		}
		else
		{
			$users = explode(", ",$roww[8]);
			$user = $_COOKIE['username'];
			if(in_array($user,$users))
			{
				$count=$count+1;
			}
		}
	}
	$result = mysqli_query($conn, $sql);
	if($count == 0)
	{
		echo "<script>";
		echo "$(document).ready(function(){";
		echo '$("#misc").hide();});';
		echo "</script>";
	}
	else
	{
		$a = $count;
		$b = $count;
		if($count<=5)
		{
			while($roww = mysqli_fetch_row($result))
			{
				if($roww[8]=='all')
				{
					echo "<script>";
					echo "$(document).ready(function(){";
					echo '$("#showall").hide();';
					echo '$("#miscellaneous").prepend("';
					echo "<a href='/view/".$roww[0]."' class= 'list-group-item list-group-item-action'>".$roww[1]." ";
					if($a <= 2)
					echo "<span class='badge badge-danger badge-pill'>NEW</span>";
					echo '</a>")});';
					echo "</script>";
					$a--;
				}
				else
				{
					$users = explode(", ",$roww[8]);
					$user = $_COOKIE['username'];
					if(in_array($user,$users))
					{
						echo "<script>";
						echo "$(document).ready(function(){";
						echo '$("#showall").hide();';
						echo '$("#miscellaneous").prepend("';
						echo "<a href='/view/".$roww[0]."' class= 'list-group-item list-group-item-action'>".$roww[1]." ";
						if($a <= 2)
						echo "<span class='badge badge-danger badge-pill'>NEW</span>";
						echo '</a>")});';
						echo "</script>";
						$a--;
					}
				}
			}
			
		}
		else
		{
			while($roww = mysqli_fetch_row($result))
			{
				if($roww[8]=='all')
				{
					if($b > 5)
					{
						echo "<script>";
						echo "$(document).ready(function(){";
						echo '$("#miscellaneous").prepend("';
						echo "<a href='/view/".$roww[0]."' class= 'oldmisc list-group-item list-group-item-action'>".$roww[1]." ";
						if($a <= 2)
						echo "<span class='badge badge-danger badge-pill'>NEW</span>";
						echo '</a>")});';
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "$(document).ready(function(){";
						echo '$("#miscellaneous").prepend("';
						echo "<a href='/view/".$roww[0]."' class= 'list-group-item list-group-item-action'>".$roww[1]." ";
						if($a <= 2)
						echo "<span class='badge badge-danger badge-pill'>NEW</span>";
						echo '</a>")});';
						echo "</script>";
					}
					$a--;
					$b--;
				}
				else
				{
					$users = explode(", ",$roww[8]);
					$user = $_COOKIE['username'];
					if(in_array($user,$users))
					{
						if($b > 5)
						{
							echo "<script>";
							echo "$(document).ready(function(){";
							echo '$("#miscellaneous").prepend("';
							echo "<a href='/view/".$roww[0]."' class= 'oldmisc list-group-item list-group-item-action'>".$roww[1]." ";
							if($a <= 2)
							echo "<span class='badge badge-danger badge-pill'>NEW</span>";
							echo '</a>")});';
							echo "</script>";
						}
						else
						{
							echo "<script>";
							echo "$(document).ready(function(){";
							echo '$("#miscellaneous").prepend("';
							echo "<a href='/view/".$roww[0]."' class= 'list-group-item list-group-item-action'>".$roww[1]." ";
							if($a <= 2)
							echo "<span class='badge badge-danger badge-pill'>NEW</span>";
							echo '</a>")});';
							echo "</script>";
						}
						$a--;
						$b--;
					}
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
?>
<?php
    $uname = $_COOKIE['username'];
	$sql = "SELECT * FROM login_details WHERE USERNAME = '$uname'";
	$p = mysqli_query($conn, $sql);
	$q = mysqli_fetch_assoc($p);
	$uname = $q['FIRST_NAME'];
	mysqli_close($conn);
?>
<script>
	$(document).ready(function(){
		$(".oldmisc").hide();
		$("#showall").click(function(){
			$(".oldmisc").slideToggle();
		});
	});
</script>
</head>
<body class="" style="background-color:#090a12;">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand text-uppercase font-weight-bold brand" href="/home">
		<i class="fas fa-user-graduate fa-lg"></i> biologia
	</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse text-uppercase font-weight-bold" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item  align-self-center">
        		<a class="nav-link" href="/home"><i class="fas fa-home"></i> Home</a>
      		</li>
      		<li class="nav-item dropdown align-self-center">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-flask"></i> Experiments</a>
        		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          			<a class="dropdown-item text-wrap" href="/list/lab01">Immunology Lab</a>
		  			<div class="dropdown-divider"></div>
          			<a class="dropdown-item text-wrap" href="/list/lab02">Bioprocess Technology Lab</a>
          			<div class="dropdown-divider"></div>
          			<a class="dropdown-item text-wrap" href="/list/lab03">Unit Operations of CE Lab - II</a>
        		</div>
      		</li>
	  		<li class="nav-item dropdown  align-self-center">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book"></i> Notes</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
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
				<a class="navbar-brand text-capitalize nav-item">Hi <span class="text-uppercase"><?php echo $uname;?></span> <i class="far fa-smile"></i></a>
		  	</li>
		</ul>

    	<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link my-2 my-sm-0 btn btn-danger" href="/0" id="logout">Log Out <i class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	
  	</div>
</nav>
<div class="container i">
	<div class="carousel-container">
  		<div id="carousels" class="carousel slide" data-ride="carousel" data-interval="6000">
    		<ol class="carousel-indicators">
			  <li data-target="#carousels" data-slide-to="0" class="active"></li>
			  <li data-target="#carousels" data-slide-to="1"></li>
			  <li data-target="#carousels" data-slide-to="2"></li>
			  <li data-target="#carousels" data-slide-to="3"></li>
			  <li data-target="#carousels" data-slide-to="5"></li>
			  <li data-target="#carousels" data-slide-to="6"></li>
    		</ol>
			<div class="carousel-inner">
      			<div class="carousel-item active">
					<div class="d-block w-100 carousel-view car1">
        			<div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[0][0]; ?></u></h5>
          				<p><?php echo $car[0][1]; ?></p>
        			</div></div>
      			</div>
      			<div class="carousel-item">
					<div class="d-block w-100 carousel-view car2">
					    <div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[1][0]; ?></u></h5>
          				<p><?php echo $car[1][1]; ?></p>
        			</div>
					</div>
        			
      			</div>
      			<div class="carousel-item">
					<div class="d-block w-100 carousel-view car3">
        			<div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[2][0]; ?></u></h5>
          				<p><?php echo $car[2][1]; ?></p>
        			</div></div>
      			</div>
	  			<div class="carousel-item">
					<div class="d-block w-100 carousel-view car4">
        			<div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[3][0]; ?></u></h5>
          				<p><?php echo $car[3][1]; ?></p>
        			</div></div>
      			</div>
	  			<div class="carousel-item">
					<div class="d-block w-100 carousel-view car5">
        			<div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[4][0]; ?></u></h5>
          				<p><?php echo $car[4][1]; ?></p>
        			</div></div>
      			</div>
	  			<div class="carousel-item">
					<div class="d-block w-100 carousel-view car6">
        			<div class="carousel-caption wrapperr">
          				<h5 class="text-uppercase font-weight-bold"><u><?php echo $car[5][0]; ?></u></h5>
          				<p><?php echo $car[5][1]; ?></p>
        			</div></div>
      			</div>
    		</div>
    		<a class="carousel-control-prev" href="#carousels" role="button" data-slide="prev">
      			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		</a>
    		<a class="carousel-control-next" href="#carousels" role="button" data-slide="next">
      			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		</a>
  		</div>
	</div>
</div>
<div class="container-fluid data col-12">
	<div class="row">
		<div class="container-fluid  col-sm-12 col-md-12 col-lg-12 main">
			<div class="container-fluid text-center  h2 bg-primary rounded">
				<i class="fas fa-sync-alt fa-spin"></i> UPDATES
			</div>
			<div class="container-fluid text-black-50 text-uppercase" style="margin: 0px; padding: 0px; font-weight: 600;">
				<div class="list-group" id="updates">
			  		
				</div>
			</div>
		</div>
		<div class="container col-sm col-md col-lg main">
			<div class="container-fluid text-center  h2 bg-success rounded">
				<i class="fas fa-flask"></i> EXPERIMENTS
			</div>
			<div class="container-fluid text-black-50" style="margin: 0px; padding: 0px;">
				<div class="list-group text-uppercase">
			  		<a href="/list/lab01" class="list-group-item list-group-item-action"><center>Immunology Laboratory</center></a>
			  		<a href="/list/lab02" class="list-group-item list-group-item-action"><center>Bioprocess Technology Laboratory</center></a>
			  		<a href="/list/lab03" class="list-group-item list-group-item-action"><center>Unit Operations of Chemical Engineering Laboratory- II</center></a>
				</div>
			</div>
		</div>
		<div class="container col-sm col-md col-lg main">
			<div class="container-fluid text-center h2 bg-success rounded">
				<i class="fas fa-book"></i> NOTES
			</div>
			<div class="container-fluid text-black-50 " style="margin: 0px; padding: 0px;">
				<div class="list-group  text-uppercase">
			  		<a href="/list/sub01" class="list-group-item list-group-item-action"><center>Biochemical Reaction Engineering and Bioreactor Design</center></a>
			  		<a href="/list/sub02" class="list-group-item list-group-item-action"><center>Cell and Tissue Culture</center></a>
			  		<a href="/list/sub03" class="list-group-item list-group-item-action"><center>Bioseparation and Biochemical Analysis</center></a>
			  		<a href="/list/sub04" class="list-group-item list-group-item-action"><center>Unit Operations of Chemical Engineering-II</center></a>
			  		<a href="/list/sub05" class="list-group-item list-group-item-action"><center><?php echo $OE;?></center></a>
				</div>
			</div>
		</div>
	</div>
<div class="row" id="misc">
	<div class="container-fluid  col-sm-12 col-md-12 col-lg-12 main">
			<div class="container-fluid text-center  h3 bg-warning rounded">
				<i class="fas fa-bolt"></i> MISCELLANEOUS <div class="container" id="showall">
				<button class="badge badge-dark" style="font-size: 10px; margin-bottom: 5px;" >SHOW ALL</button></div>
			</div>
			<div class="container-fluid text-uppercase text-black-50" style="margin: 0px; padding: 0px;">
				<div class="list-group" id="miscellaneous">
			  		
				</div>
			</div>
		</div>
</div>
</div>
<div class="text-uppercase text-center card-footer bg-light">
	
	<center>
	<p><a href="/admin/" class="badge badge-danger" style="text-decoration: none; color: white;" target="_blank">ADMIN LOGIN</a></p>
	For feedback or if you find any problem<br>
	<a href="mailto:ch.kr.email@gmail.com" class="alert-link badge badge-primarcarousel-view"><i class="fas fa-envelope"></i> Email Me</a>
	</center>
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