<?php
$k=0;
include ("./res.php");
if($pre!=2)
	header("Location: ./index.php");
else
$ambil=mysqli_query($koneksi, "SELECT * FROM data where lokasi='$lokasi' ORDER BY id DESC LIMIT 0, 20");
$chktd=mysqli_query($koneksi, "SELECT * FROM data WHERE day='$har' AND bulan='$bln' AND tahun='$now' AND lokasi='$lokasi'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verifikasi :: <?php echo $appnam; ?> <?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<style>
		.emp{
			color: #999;
		}

		.emp:hover{
			color: #777;
			font-weight: 600;
			cursor: help;
		}
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
	<h3>DATA YANG TERSEDIA</h3>
	<div style="overflow-x:auto;">
      <table class="table table-striped table-hover table-responsive vtext">
      <thead>
      <tr class="bg-info text-white">
      <th>#</th>
      <th>Tanggal</th>
      <th>Dibuat Oleh</th>
      <th>Verifikasi</th>
      <th>Aksi</th>
      </tr>
      </thead>
    <?php
    if(mysqli_num_rows($chktd)==0)
		echo "<tr class='warning emp'><td colspan='5' align='center'><i># Data pada hari ini belum dibuat oleh Petugas #</i></td></tr>";
    while($data=mysqli_fetch_array($ambil)){
    $bul=bulanan($data[bulan]);
    $k++;
    if($data['verifikasi']==0)
    	$veri="Belum<sup><span class='glyphicon glyphicon-asterisk'></span></sup>";
    else
    	$veri="Sudah";
    echo "
    <tr>
    <td>$k</td>
    <td>$data[day] $bul $data[tahun]</td>
    <td>$data[creator]</td>
    <td>$veri</td>
    <td><a href='./lihatdata.php?data=$data[id]' title='Rincian Data Tanggal: \"$data[day] $bul $data[tahun]\"' class='btn btn-primary btn-sm vtext'><span class='glyphicon glyphicon-edit'></span><i>&nbsp;Rincian</i></a></td>
    </tr>";
    if(mysqli_num_rows($cek)==0 && $k==0)
		echo "<tr><td colspan='5' align='center'><h1><span class='text-muted glyphicon glyphicon-file'></span></h1><h3>Data Belum Ada data!</h3><sub>Data Belum dibuat oleh cabang satupun!</sub><br />&nbsp;</td></tr>";
	}
	?>
</table>
</div>
<div class="bwh">
		<p><strong><?php echo "$appnam <i>$ver</i>"; ?></strong> <b>-</b> <i>PDAM &amp; POLINDRA &#169; <?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?></i></p>
	</div>
</div>
</body>
</html>