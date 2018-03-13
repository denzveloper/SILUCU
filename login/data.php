<?php
include("./res.php");
if($pre!=3)
  header("Location: ./index.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Isi Data :: <?php echo $appnam; ?> <?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<style>
		body {
			background-color: #fbfbfb;
		}
	</style>
	<script src="../js/jquery.min.js"></script>
    <script src="../js/passho.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Silahkan Pilih menunya..</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><?php echo $appnam; ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="<?php echo $a;?>">Membuat Laporan</a></li>
                <li><a href="<?php echo $b;?>">Verifikasi Laporan</a></li>
                <li><a href="<?php echo $c;?>">Lihat Laporan</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo singkat($nama); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					          <li><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li><a href="<?php echo $y;?>">Akun Manager</a></li>
                    <li><a href="<?php echo $z;?>">Buat akun baru</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Log Keluar</li>
                    <li><a href="logout.php" onclick="return confirm('<?php echo $nama;?> Yakin, ingin keluar dari <?php echo $appnam ?>?')"><?php echo "$nama";?></a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
    <!-- Atas-Bawah -->
    <div class="container marketing">
    <?php
    	if(isset($_POST['buat'])){
    		//Cek data hari ini ada tidak
    		$cek = mysqli_query($koneksi, "SELECT * FROM data WHERE day='$har' AND bulan='$bln' AND tahun='$now' AND lokasi='$lokasi'");
    		if(mysqli_num_rows($cek)==0 && $pre==3){
    			$namaan=antiin($nama);
    			//Save to database
    			$ok=mysqli_query($koneksi, "INSERT INTO data (id, day, bulan, tahun, creator, lokasi, spk_keluar, spk_dilak, spk_tdkdilak, spk_pk, spk_water, spk_slbaru, kl, ku, kon, bocor, dll, putus_ku2, putus_sl2, jml_sl, jml_ku, baru_sl, baru_ku, pk_sl, pk_ku, mutarif_sl, mutarif_ku, putus_sl1, putus_ku1, verifikasi, ver_by) VALUES ('', '$har', '$bln', '$now', '$namaan', '$lokasi', '$_POST[spk_keluar]', '$_POST[spk_dilak]', '$_POST[spk_tdkdilak]', '$_POST[spk_pk]', '$_POST[spk_water]', '$_POST[spk_slbaru]', '$_POST[kl]', '$_POST[ku]', '$_POST[kon]', '$_POST[bocor]', '$_POST[dll]', '$_POST[putus_ku2]', '$_POST[putus_sl2]', '$_POST[jml_sl]', '$_POST[jml_ku]', '$_POST[baru_sl]', '$_POST[baru_ku]', '$_POST[pk_sl]', '$_POST[pk_ku]', '$_POST[mutarif_sl]', '$_POST[mutarif_ku]', '$_POST[putus_sl1]', '$_POST[putus_ku2]', 0, '$namaan')");
    			if($ok){
    				echo '<div class="alert alert-success"><b>Berhasil!</b><br />Data Telah berhasil dikirim!<br />
    				<sub>Data yang Anda kirim sudah disimpan dan menunggu untuk verifikasi data.</sub></div>';
    			}else{
    				echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';

    			}
    		}else{
    			echo '<div class="alert alert-warning"><b>Operasi Tidak Diizinkan!</b><br />Silahkan hubungi Administrator</div>';
    		}
    	}
    ?>
    <h3>FORM PENGISIAN DATA</h3>
    <form role="form" action="" method="post">
    <h4>Laporan Distribusi</h4>
    <div style="overflow-x:auto;">
    <table cellpadding="10" align="center" class="table table-bordered table-responsive">
    <tr align="center" class="bg-primary">
        <td colspan="3">SPK PENUTUPAN</td>
        <td rowspan="2"> SPK PENYAMBUNGAN KEMBALI</td>
        <td rowspan="2"> SPK PENGGANTI WATER MATER</td>
        <td rowspan="2"> SPK PEMASANGAN WATER METER SL BARU</td>
    </tr>
    <tr align="center" class="bg-primary">
    	<td>DIKELUARKAN</td>
    	<td>DILAKSANAKAN</td>
    	<td>TIDAK DILAKSANAKAN</td>
    </tr>
    <tr align="center">
        <td style="padding: 5px"><input type="number" name="spk_keluar" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="spk_dilak" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="spk_tdkdilak" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="spk_pk" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="spk_water" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="spk_slbaru" style="width: 130px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>  
    </tr>
	</table>
	</div>
	<div style="overflow-x:auto;">
	<h4>Pengaduan Teknik</h4>
	<table cellpadding="10" align="center" class="table table-bordered table-responsive">
    <tr align="center" class="bg-primary">
        <td rowspan="2"> KUALITAS </td>
        <td rowspan="2"> KUANTITAS </td>
        <td rowspan="2"> KONTINUITAS </td>
        <td rowspan="2"> KEBOCORAN </td>
        <td rowspan="2"> LAIN-LAIN </td>
        <td colspan="2">PEMUTUSAN</td>
    </tr>
    <tr align="center" class="bg-primary">
        <td>KU</td>
        <td>SL</td>
    </tr>
    <tr align="center">
        <td style="padding: 5px"><input type="number" name="kl" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="ku" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="kon" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="bocor" style="width: 100px"onkeypress="return hanyaAngka(event) required autofocus "/></input></td>
        <td style="padding: 5px"><input type="number" name="dll" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="putus_ku2" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="putus_sl2" style="width: 100px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
    </tr>
	</table>
	</div>
	<h4>Laporan Hublang</h4>
    <div style="overflow-x:auto;">
	<table cellpadding="10" align="center" class="table table-bordered table-responsive">
    <tr align="center" class="bg-primary">
        <td colspan="2" rowspan="2" align="center"> JUMLAH <br>SL BARU </td>
        <td colspan="8" align="center" style="padding: 10px"> SAMBUNG LANGGAN </td>
    </tr>
    <tr align="center" class="bg-primary">
        <td colspan="2"> BARU </td>
        <td colspan="2"> PENYAMBUNGAN KEMBALI </td>
        <td colspan="2"> MUTASI TARIF </td>
        <td colspan="2"> PEMUTUSAN </td>
        </tr>
    <tr align="center" class="bg-primary">
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
    </tr>
    <tr align="center">
        <td style="padding: 5px"><input type="number" name="jml_sl" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="jml_ku" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="baru_sl" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="baru_ku" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="pk_sl" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="pk_ku" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="mutarif_sl" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="mutarif_ku" style="width: 70px"onkeypress="return hanyaAngka(event)"/></input></td>
        <td style="padding: 5px"><input type="number" name="putus_sl1" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
        <td style="padding: 5px"><input type="number" name="putus_ku1" style="width: 70px"onkeypress="return hanyaAngka(event)" required autofocus /></input></td>
    </tr>
	</table>
	</div>
	<hr />
	<div class="col-lg-8">
		&nbsp;
	</div>
	<div class="col-lg-2">
	<button type="submit" name="buat" class="btn btn-success btn-block" onclick="return confirm('Data sudah benar? Data yang telah dikirim tidak dapat diedit. Yakin Melanjutkan?')"><span class="glyphicon glyphicon-send"></span>&nbsp;Simpan</button><br /></div>
	<div class="col-lg-2">
	<button type="reset" name="reset" class="btn btn-info btn-block"><span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset</button></div>
    </form>
    <footer>
    <div class="bwh">
		<p><strong><?php echo "$appnam <i>$ver</i>"; ?></strong> <b>-</b> <i>PDAM &amp; POLINDRA &#169; <?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?></i></p>
	</div>
	</footer>
	</div>
 </body>
</html>