<link rel="shortcut icon" type="image/png" href="../img/silcu-logo.png"/>
<?php
session_start();
//check a trust login?
if(empty($_SESSION)){
	header("Location: ./logout.php");
}
include("../res/pass.php");
include("../res/app.php");
include("../res/koneksi.php");
$ip=convert(hashing($_SERVER['REMOTE_ADDR']));
$bro=convert(hashing($_SERVER['HTTP_USER_AGENT']));
$id=convert($_SESSION['id']);
$data=mysqli_query($koneksi, "SELECT * FROM users WHERE username='$id'");
$data=mysqli_fetch_array($data);
$username=$data['username'];
$sandi=$data['password'];
$nama=$data['realname'];
$lokasi=$data['locations'];
$pre=$data['level'];
$coks=convert(hashing($username));
$cokp=convert($sandi);
//Cookies check it true?
if($_COOKIE['u']!=$coks||$_COOKIE['s']!=$cokp||$_COOKIE['b']!=$bro||$_COOKIE['i']!=$ip){
	header("Location: ./logout.php");
}
//Get Previlege and what is shown
switch($pre){
	case 1:
		$account="Super User";
		$a="#";
		$b="#";
		$c="tampil.php";
		$x="eduser.php";
		$y="manuser.php";
		$z="cruser.php";
		$link=$c;
		$ln="Melihat data-data cabang";
	break;
	case 2:
		$account="Admin Cabang";
		$a="#";
		$b="verifikasi.php";
		$c="#";
		$x="eduser.php";
		$y="manuser.php";
		$z="cruser.php";
		$link=$b;
		$ln="Verifikasi data-data";
	break;
	case 3:
		$account="Petugas Isi Data";
		$a="data.php";
		$b="#";
		$c="#";
		$x="eduser.php";
		$y="#";
		$z="#";
		$link=$a;
		$ln="Membuat data baru";
	break;
	default:
		header("Location: ./logout.php");
}
?>