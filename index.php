<?php
session_start();
if($_SESSION)
	header("location: ./login");
include("./res/app.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<link rel="shortcut icon" type="image/png" href="./img/silcu-logo.png"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PORTAL LOGIN SILCU v<?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/styles.css" rel="stylesheet">
	<style type="text/css">
	.bgdif{
		background-color: #5294E2;
		color: #fff;
	}
	.bgdiff{
		background-color: #fff;
		color: #5294E2;
	}
	@-webkit-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
	}
	@-moz-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
	}
	@-ms-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
	}
	body{
     -webkit-animation: blink 90s infinite;
     -moz-animation:    blink 90s infinite;
     -ms-animation:     blink 90s infinite;
     color: #fff;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="rowlogin">
			<h2 id="dpntxt"><img class="featurette-image img-responsive center-block" src="./img/silcu-logo.png" width="75px" /><span class="bgdiff">Log Masuk </span><b class="bgdif"><?php echo $appnam; ?>&nbsp;</b></h2>
			<div class="loginer eff">
				<?php
				if(isset($_POST['login'])){
					include("./res/koneksi.php");
					include("./res/pass.php");
					$username = antiin($_POST['username']);
					$password = hashing(antiin($_POST['password']));
					$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($query)==0){
						echo '<div class="alert alert-danger"><b>Log Masuk Gagal!</b><br><span title="Harap perhatikan Kapitalisasi huruf!" style="cursor: help;">User atau Password tidak cocok!</span></div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						if($row['username']==$username && $row['password']==$password){
							//Create Cookies
							$usr=convert(hashing($username.convert($password)));
							$add=convert(hashing($_SERVER['REMOTE_ADDR']));
							$bro=convert(hashing($_SERVER['HTTP_USER_AGENT']));
							$ttl=time()+60*40;
							setcookie("a", $usr, $ttl, '/');
							setcookie("b", $bro, $ttl, '/');
							setcookie("i", $add, $ttl, '/');
							//Session
							$_SESSION['id']=convert($row['username']);
							header("location: ./login");
						}
						else{
							echo '<div class="alert alert-danger"><b>Log Masuk Gagal!</b><br><span title="Harap perhatikan Kapitalisasi huruf!" style="cursor: help;">User dan Password tidak cocok!</span></div>';
						}
					}
				}
				?>
				<form role="form" action="" method="post">
					<div class="form-group">
						<input type="text" name="username" class="form-user form eff" placeholder="Nama Pengguna" required autofocus />
						<br /><br />
					<div class="input-group">
						<input type="password" name="password" class="form-pass form eff" id="pwd" placeholder="Kata Sandi" required autofocus /><span title="Show Password" class="input-group-btn"><button class="buttn eff" type="button" id="show"><i class="glyphicon glyphicon-eye-open"></i></button>
         				</span>
					</div>
					</div>
					<div class="form-group">
						<input title="Log Masuk Sistem" type="submit" name="login" class="butn eff" value="Log Masuk" />
					</div>
				</form>
			</div>
    		<span><?php echo "<b>$appnam</b> <i>$ver</i>"; ?> &#169;<?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?> PDAM &amp; POLINDRA</span>
		</div>
	</div>
	<script src="./js/passho.js"></script>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</body>
</html>