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
$idus = $data['username'];
$username = $data['username'];
$sandi = $data['password'];
$nama = $data['realname'];
$lokasi = $data['locations'];
$pre=$_SESSION['level'];
$uname=$_SESSION['username'];
$user=$_SESSION['name'];
$coks=convert(hashing($uname));
$cokp=convert($sandi);
if($_COOKIE['u']!=$coks||$_COOKIE['s']!=$cokp||$_COOKIE['b']!=$bro||$_COOKIE['i']!=$ip){
	header("Location: ./logout.php");
}
if($pre==1){
	$account="Super User";
	$a="test.php";
	$b="test.php";
	$c="#";
	$x="eduser.php";
	$y="manuser.php";
	$z="cruser.php";
}
else if($pre==2){
	$account="Admin Cabang";
	$a="test.php";
	$b="#";
	$c="#";
	$x="eduser.php";
	$y="manuser.php";
	$z="cruser.php";
}
else if($pre==3){
	$account="Petugas Isi Data";
	$a="#";
	$b="#";
	$c="#";
	$x="eduser.php";
	$y="#";
	$z="#";
}
else{
header("Location: ./logout.php");
}
?>