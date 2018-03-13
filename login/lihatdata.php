<?php
include("./res.php");
if($pre!=2)
  header("Location: ./index.php");
if($_GET['data']=="")
    header("Location: ./verifikasi.php");
$tabel=$_GET['data'];
$query=mysqli_query($koneksi, "SELECT * FROM data WHERE id=$tabel AND lokasi='$lokasi'");
$data=mysqli_fetch_array($query);
if(!isset($data['id'])){
    header("Location: ./verifikasi.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rincian Data :: <?php echo $appnam; ?> <?php echo $ver; ?></title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <style>
        body {
            background-color: #fbfbfb;
        }
    </style>
    <script src="../js/jquery.min.js"></script>
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
                <li><a href="<?php echo $a;?>">Membuat Laporan</a></li>
                <li class="active"><a href="<?php echo $b;?>">Verifikasi Laporan</a></li>
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
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
    <div class="container marketing">
    <h3>Data <?php $bul=bulanan($data[bulan]); echo "$data[day] $bul $data[tahun]";?></h3>
<?php
    if(isset($_POST['approve'])){
        if($pre==2){
            $namaan=antiin($nama);
        $ok=mysqli_query($koneksi, "UPDATE data SET verifikasi=1, ver_by='$namaan' WHERE id='$tabel' AND lokasi='$lokasi' AND verifikasi=0");
        if($ok){
          $bul=bulanan($data[bulan]);
          echo "<div class='alert alert-success'><b>Terverifikasi!</b><br />Data pada Tanggal: \"$data[day] $bul $data[tahun]\" untuk wilayah \"$lokasi\"  Telah berhasil diverifikasi dan sudah dikirimkan ke Pusat!<br /></div>
          <a href='./verifikasi.php' title='Kembali..'>&#171;Kembali..</a>";
        }
        else{
          echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div><a href="./verifikasi.php" title="Kembali..">&#171;Kembali..</a>';
        }
        }
    }
    elseif(isset($_POST['cancel'])){
        if($pre==2){
         $ok=mysqli_query($koneksi, "DELETE FROM data WHERE id='$tabel' AND lokasi='$lokasi' AND verifikasi=0");
          if($ok){
            $bul=bulanan($data[bulan]);
            echo "<div class='alert alert-warning'><b>Data Dihapus!</b><br />Data pada Tanggal: \"$data[day] $bul $data[tahun]\" untuk wilayah \"$lokasi\" Telah dihapus!<br /></div>
          <a href='./verifikasi.php' title='Kembali..'>&#171;Kembali..</a>";
          }
          else{
            echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi pada saat menghapus!<br /><i>Coba Lagi nanti..</i></div><a href="./verifikasi.php" title="Kembali..">&#171;Kembali..</a>';
          }
        }
    }
    else{
    echo "
    <h4>Laporan Distribusi</h4>
    <div style='overflow-x:auto;'>
    <table cellpadding='10' align='center' class='table table-bordered table-responsive'>
    <tr align='center' class='bg-primary'>
        <td colspan='3'>SPK PENUTUPAN</td>
        <td rowspan='2'> SPK PENYAMBUNGAN KEMBALI</td>
        <td rowspan='2'> SPK PENGGANTI WATER MATER</td>
        <td rowspan='2'> SPK PEMASANGAN WATER METER SL BARU</td>
    </tr>
    <tr align='center' class='bg-primary'>
    	<td>DIKELUARKAN</td>
    	<td>DILAKSANAKAN</td>
    	<td>TIDAK DILAKSANAKAN</td>
    </tr>
    <tr align='center'>
        <td style='padding: 5px'>$data[spk_keluar]</td>
        <td style='padding: 5px'>$data[spk_dilak]</td>
        <td style='padding: 5px'>$data[spk_tdkdilak]</td>
        <td style='padding: 5px'>$data[spk_pk]</td>
        <td style='padding: 5px'>$data[spk_water]</td>
        <td style='padding: 5px'>$data[spk_slbaru]</td>  
    </tr>
	</table>
	</div>
	<div style='overflow-x:auto;'>
	<h4>Pengaduan Teknik</h4>
	<table cellpadding='10' align='center' class='table table-bordered table-responsive'>
    <tr align='center' class='bg-primary'>
        <td rowspan='2'> KUALITAS </td>
        <td rowspan='2'> KUANTITAS </td>
        <td rowspan='2'> KONTINUITAS </td>
        <td rowspan='2'> KEBOCORAN </td>
        <td rowspan='2'> LAIN-LAIN </td>
        <td colspan='2'>PEMUTUSAN</td>
    </tr>
    <tr align='center' class='bg-primary'>
        <td>KU</td>
        <td>SL</td>
    </tr>
    <tr align='center'>
        <td style='padding: 5px'>$data[kl]</td>
        <td style='padding: 5px'>$data[ku]</td>
        <td style='padding: 5px'>$data[kon]</td>
        <td style='padding: 5px'>$data[bocor]</td>
        <td style='padding: 5px'>$data[dll]</td>
        <td style='padding: 5px'>$data[putus_ku2]</td>
        <td style='padding: 5px'>$data[putus_sl2]</td>
    </tr>
	</table>
	</div>
	<h4>Laporan Hublang</h4>
    <div style='overflow-x:auto;'>
	<table cellpadding='10' align='center' class='table table-bordered table-responsive'>
    <tr align='center' class='bg-primary'>
        <td colspan='2' rowspan='2' align='center'> JUMLAH <br>SL BARU </td>
        <td colspan='8' align='center' style='padding: 10px'> SAMBUNG LANGGAN </td>
    </tr>
    <tr align='center' class='bg-primary'>
        <td colspan='2'> BARU </td>
        <td colspan='2'> PENYAMBUNGAN KEMBALI </td>
        <td colspan='2'> MUTASI TARIF </td>
        <td colspan='2'> PEMUTUSAN </td>
        </tr>
    <tr align='center' class='bg-primary'>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
        <td>SL</td><td>KU</td>
    </tr>
    <tr align='center'>
        <td style='padding: 5px'>$data[jml_sl]</td>
        <td style='padding: 5px'>$data[jml_ku]</td>
        <td style='padding: 5px'>$data[baru_sl]</td>
        <td style='padding: 5px'>$data[baru_ku]</td>
        <td style='padding: 5px'>$data[pk_sl]</td>
        <td style='padding: 5px'>$data[pk_ku]</td>
        <td style='padding: 5px'>$data[mutarif_sl]</td>
        <td style='padding: 5px'>$data[mutarif_ku]</td>
        <td style='padding: 5px'>$data[putus_sl1]</td>
        <td style='padding: 5px'>$data[putus_ku1]</td>
    </tr>
	</table>
	</div>
    <hr />";
    if($data['verifikasi']==0||isset($_POST['approve'])||isset($_POST['cancel'])){
    echo "
    <form role='form' action='' method='post'>
        <input type='hidden' name='id' value='$tabel' />
    <div class='col-lg-6'>
        &nbsp;
    </div>
    <div class='col-lg-2'>
    <a href='verifikasi.php' class='btn btn-info btn-block' onclick=\"return confirm('Yakin ingin kembali ke menu sebelumnya?')\"><span class='glyphicon glyphicon-arrow-left'></span>&nbsp;Kembali</a><br />
    </div>
    <div class='col-lg-2'>
    <button type='submit' name='cancel' class='btn btn-danger btn-block' onclick=\"return confirm('Dengan ini data akan dihapus, dan tidak dapat dikembalikan lagi. Yakin?')\"><span class='glyphicon glyphicon-trash'></span>&nbsp;Hapus</button><br />
    </div>
    <div class='col-lg-2'>
    <button type='submit' name='approve' class='btn btn-success btn-block' onclick=\"return confirm('Dengan ini data akan dikirimkan ke pusat dan tidak dapat diubah lagi. Yakin?')\"><span class='glyphicon glyphicon-ok'></span>&nbsp;Verifikasi Data</button><br />
    </div>
</form>
    ";
}
}
?>
</div>
</body>
</html>