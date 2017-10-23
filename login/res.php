<?php
if(empty($_SESSION)){
	header("Location: ../");
}
include("../res/pass.php");
include("../res/app.php");
include("../res/koneksi.php");
$id=$_SESSION['id'];
$data=mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$data=mysqli_fetch_array($data);
$username = $data['username'];
$sandi = $data['password'];
$nama = $data['realname'];
$lokasi = $data['locations'];
$pre=$_SESSION['level'];
$uname=$_SESSION['username'];
$user=$_SESSION['name'];
if($pre==1){
	$account="Super User";
	/*Its Link Disable or not*/
	$a="test.php";
	$b="test.php";
	$c="#";
	$x="eduser.php";
	$y="akunman.php";
	$z="cruser.php";
}
else if($pre==2){
	$account="Admin Cabang";
	/*Its Link Disable or not*/
	$a="test.php";
	$b="#";
	$c="#";
	$x="eduser.php";
	$y="akunman.php";
	$z="cruser.php";
}
else if($pre==3){
	$account="User";
	/*Its Link Disable or not*/
	$a="#";
	$b="#";
	$c="#";
	$x="eduser.php";
	$y="#";
	$z="#";
}
else{
	session_destroy();
	header("Location: ../");
}
?>