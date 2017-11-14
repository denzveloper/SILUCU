<?php
if(empty($_SESSION)){
	header("Location: ./logout.php");
}
include("../res/pass.php");
include("../res/app.php");
include("../res/koneksi.php");
$ip=convert(hashing($_SERVER['REMOTE_ADDR']));
$bro=convert(hashing($_SERVER['HTTP_USER_AGENT']));
$id=$_SESSION['id'];
$data=mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$data=mysqli_fetch_array($data);
$idus=$data['username'];
$username=$data['username'];
$sandi=$data['password'];
$nama=$data['realname'];
$lokasi=$data['locations'];
$pre=$data['level'];
$uname=$_SESSION['username'];
$user=$_SESSION['name'];
$coks=convert(hashing($uname));
$cokp=convert($sandi);
if($_COOKIE['u']!=$coks||$_COOKIE['s']!=$cokp||$_COOKIE['b']!=$bro||$_COOKIE['i']!=$ip){
	header("Location: ./logout.php");
}
switch($pre){
	case 1:
		$account="Super User";
		$a="#";
		$b="#";
		$c="tampil.php";
		$x="eduser.php";
		$y="manuser.php";
		$z="cruser.php";
	break;
	case 2:
		$account="Admin Cabang";
		$a="#";
		$b="verifikasi.php";
		$c="#";
		$x="eduser.php";
		$y="manuser.php";
		$z="cruser.php";
	break;
	case 3:
		$account="Petugas Isi Data";
		$a="data.php";
		$b="#";
		$c="#";
		$x="eduser.php";
		$y="#";
		$z="#";
	break;
	default:
		header("Location: ./logout.php");
}
?>