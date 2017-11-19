<?php
session_start();
if($_SESSION){
	header("Location: ./login");
}
include("./res/app.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<link rel="shortcut icon" type="image/png" href="./favicon.png"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN SILCU v<?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/styles.css" rel="stylesheet">
	<style>
		#back {
			background-color: #0099ff;
			color: #fff;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body id="back">
	<div class="container">
		<div class="rowlogin">
			<h2><img class="featurette-image img-responsive center-block" src="./img/silcu-logo.png" width="75px" /> Log Masuk <b><?php echo $appnam; ?></b></h2>
			<div class="loginer">
				<?php
				if(isset($_POST['login'])){
					include("./res/koneksi.php");
					include("./res/pass.php");
					$username = addslashes(trim($_POST['username']));
					$password = hashing(addslashes(trim($_POST['password'])));
					$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger"><b>Log Masuk Gagal!</b><br><span title="Harap perhatikan Kapitalisasi huruf!" style="cursor: help;">User dan Password tidak cocok!</span></div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						if($row['username']==$username && $row['password']==$password){
							//Cookies
							$usr=convert(hashing($username));
							$pwd=convert($password);
							$add=convert(hashing($_SERVER['REMOTE_ADDR']));
							$bro=convert(hashing($_SERVER['HTTP_USER_AGENT']));
							$ttl=time()+3600*2;
							setcookie("u", $usr, $ttl, '/');
							setcookie("b", $bro, $ttl, '/');
							setcookie("i", $add, $ttl, '/');
							setcookie("s", $pwd, $ttl, '/');
							//Session
							$_SESSION['id']=$row['id'];
							$_SESSION['name']=$row['realname'];
							$_SESSION['username']=$username;
							header("Location: ./login");
						}
						else{
							echo '<div class="alert alert-danger"><b>Log Masuk Gagal!</b><br>User dan Password tidak cocok!</div>';
						}
					}
					}
				?>
				<form role="form" action="" method="post">
					<div class="form-group">
						<input type="text" name="username" class="form-user" placeholder="Nama Pengguna" required autofocus />
					<div class="input-group">
						<input type="password" class="form-pass" id="pwd" name="password" placeholder="Kata Sandi" required autofocus /><span title="Show Password" class="input-group-btn"><button class="buttn" type="button" id="show"><i class="glyphicon glyphicon-eye-open"></i></button>
         				</span>
					</div>
					</div>
					<div class="form-group">
						<input title="Log Masuk Sistem" type="submit" name="login" class="butn" value="Log Masuk" />
					</div>
				</form>
				<button class="chgt" id="thm" title="Change Background" onclick="chgbg()"><span class="glyphicon glyphicon-refresh"></span></button>
			</div>
    		<?php echo "<b>$appnam</b> <i>$ver</i>"; ?> &#169;<?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?> PDAM dan POLINDRA
		</div>
	</div>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/passho.js"></script>
</body>
</html>