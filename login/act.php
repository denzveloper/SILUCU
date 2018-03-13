<?php
$temp="";
include ("./res.php");
if(isset($_GET['show'])){
if(isset($_GET['id'])){
if($pre==1){
	$idata=$_GET['id'];
	$data=mysqli_query($koneksi, "SELECT * FROM data WHERE id='$idata' AND verifikasi=1");
	$data=mysqli_fetch_array($data);
	if(!isset($data['id'])){
    echo "<html><head><title>Tidak ada data :: VersiCetak for $appnam $ver</title></head><body><h1>NO DATA!</h1></body></html>";
    exit;
	}
	$bul=bulanan($data[bulan]);
	echo "
	<html>
	<head>
	<title>VersiCetak for $appnam $ver</title>
	<link href='../css/bootstrap.min.css' rel='stylesheet'>
	<link href='../css/styles.css' rel='stylesheet'>
	<style>
	.table td{
    border: #000 solid 1px !important;
	}
	.capital{
		font-weight: bold;
		text-align: center;
	}
	</style>
	</head>
	<body>
	<div class='container marketing'>
	<h1 class='capital'>HASIL LAPORAN</h1>
	<table>
	<tr><th>Disusun</th><td>: <i>$data[creator]</td></tr>
    <tr><th>Diverifikasi&nbsp;</th><td>: <i>$data[ver_by]</td></tr>
    <tr><th>Tanggal</th><td>: <i>$data[day] $bul $data[tahun]</td></tr>
    </table>
    <br />
    <h2>Laporan Distribusi</h2>
    <table align='center' class='table'>
    <tr align='center'>
        <td colspan='3'>SPK PENUTUPAN</td>
        <td rowspan='2'> SPK PENYAMBUNGAN KEMBALI</td>
        <td rowspan='2'> SPK PENGGANTI WATER MATER</td>
        <td rowspan='2'> SPK PEMASANGAN WATER METER SL BARU</td>
    </tr>
    <tr align='center'>
    	<td>DIKELUARKAN</td>
    	<td>DILAKSANAKAN</td>
    	<td>TIDAK DILAKSANAKAN</td>
    </tr>
    <tr align='center'>
        <td>$data[spk_keluar]</td>
        <td>$data[spk_dilak]</td>
        <td>$data[spk_tdkdilak]</td>
        <td>$data[spk_pk]</td>
        <td>$data[spk_water]</td>
        <td>$data[spk_slbaru]</td>  
    </tr>
	</table>
	<br \>
	<h2>Pengaduan Teknik</h2>
	<table align='center' class='table'>
    <tr align='center'>
        <td rowspan='2'> KUALITAS </td>
        <td rowspan='2'> KUANTITAS </td>
        <td rowspan='2'> KONTINUITAS </td>
        <td rowspan='2'> KEBOCORAN </td>
        <td rowspan='2'> LAIN-LAIN </td>
        <td colspan='2'>PEMUTUSAN</td>
    </tr>
    <tr align='center'>
        <td>KU</td>
        <td>SL</td>
    </tr>
    <tr align='center'>
        <td>$data[kl]</td>
        <td>$data[ku]</td>
        <td>$data[kon]</td>
        <td>$data[bocor]</td>
        <td>$data[dll]</td>
        <td>$data[putus_ku2]</td>
        <td>$data[putus_sl2]</td>
    </tr>
	</table>
	<br />
	<h2>Laporan Hublang</h2>
	<table class='table'>
    <tr align='center'>
        <td colspan='2' rowspan='2' align='center'> JUMLAH <br>SL BARU </td>
        <td colspan='8' align='center' style='padding: 10px'> SAMBUNG LANGGAN </td>
    </tr>
    <tr align='center'>
        <td colspan='2'> BARU </td>
        <td colspan='2'> PENYAMBUNGAN KEMBALI </td>
        <td colspan='2'> MUTASI TARIF </td>
        <td colspan='2'> PEMUTUSAN </td>
        </tr>
    <tr align='center'>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
    </tr>
    <tr align='center'>
        <td>$data[jml_sl]</td>
        <td>$data[jml_ku]</td>
        <td>$data[baru_sl]</td>
        <td>$data[baru_ku]</td>
        <td>$data[pk_sl]</td>
        <td>$data[pk_ku]</td>
        <td>$data[mutarif_sl]</td>
        <td>$data[mutarif_ku]</td>
        <td>$data[putus_sl1]</td>
        <td>$data[putus_ku1]</td>
    </tr>
	</table>
	</div>
	</body>
	</html>
	";
}
else{
	about();
}
}
else{
	about();
}
}
else{
	about();
}
function about(){
echo "
<html>
<head>
<title>ABOUT THIS $appnam</title>
</head>
<body>
<h1>CREDITS</h1>
<p>CREATED BY: DANIYAH HAYATI, DENDY OCTAVIAN, HAFIDZ A. P., NANDIA R. N., MAWAR UTARI.</p>

<p>SYSTEM LOGIN BY: DENZVELOPER aka DzEN.</p>

<p>DESIGN BY: DANIYAH HAYATI, HAFIDZ A. P., NANDIA R. N., MAWAR UTARI.</p>

<p>UNIVERSITY: POLITEKNIK NEGERI INDRAMAYU(POLINDRA).</p>

<p>OUR CLIENT/FOR: PDAM KABUPATEN INDRAMAYU.</p>

<p>THANKS: GOOGLE, STACKOFERFLOW, W3SCHOOLS, BOOTSTRAP, MySQL/MariaDB, PHP7.</p>
</body>
</html>
";
	exit;
}
?>