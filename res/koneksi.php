<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "silcu";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo "Koneksi Gagal. Terjadi kesalahan :\n\"<i>".mysqli_connect_error()."</i>\"";
$databse = mysqli_select_db($koneksi,$db_name) or die("Database tidak dapat ditemukan! Silahkan buat terlebih dahulu!");
}
?>