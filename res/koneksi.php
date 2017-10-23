<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "trial";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'Koneksi Gagal. Terjadi kesalahan :\n'.mysqli_connect_error();
}
?>