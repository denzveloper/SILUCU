<?php
error_reporting(0);
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "db_silcu";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo "<font color='#ff4040'>";
	echo "Koneksi Gagal. Terjadi kesalahan :\n<i><span style='background-color: #FFFF00'>".mysqli_connect_error()."</span></i>.<br />";
	$databse = mysqli_select_db($koneksi,$db_name) or die("Database tidak dapat ditemukan! Silahkan buat terlebih dahulu!");
	echo "</font>";
}
?>