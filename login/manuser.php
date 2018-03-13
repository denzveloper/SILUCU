<?php
include("./res.php");
//previleges
if($pre>2)
  header("Location: ./index.php");
elseif($pre==1)
$ambil=mysqli_query($koneksi, "SELECT * FROM users");
else
$ambil=mysqli_query($koneksi, "SELECT * FROM users where locations='$lokasi'");
//
$k=0;
$shw=0;
$cari="";
if(isset($_GET['search'])&&isset($_GET['cari'])&&$_GET['cari']!=""){
	//Fuzzy Search Algorithm
	$shw=1;
	$cari=$_GET['cari'];
	$ambil=mysqli_query($koneksi, "SELECT * FROM users WHERE username LIKE '%$cari%' OR realname LIKE '%$cari%' OR locations LIKE '%$cari%'");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Manager :: <?php echo $appnam; ?> <?php echo $ver; ?></title>
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
                <li><a href="<?php echo $b;?>">Verifikasi Laporan</a></li>
                <li><a href="<?php echo $c;?>">Lihat Laporan</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo singkat($nama); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					          <li><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li class="active"><a href="<?php echo $y;?>">Akun Manager</a></li>
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
  </div>
  <div class="container marketing">
    <h3><b>Manager Akun</b></h3>
    <div class="row">
    	<form role="form" action="" method="get">
    		<div class="col-xs-7">
    		<div class="input-group input-group-sm">
      		<input type="text" name="cari" value="<?php echo $cari; ?>" class="form-control" placeholder="Search" maxlength="16">
      		<div class="input-group-btn">
        	<button class="btn btn-default" name="search" type="submit" title="Cari Pengguna!"><i class="glyphicon glyphicon-search"></i> Cari!</button>
      		</div>
    		</div>
    		</div>
    	</form>
    	</div>
      <br />
      <?php
      if($shw==1)
      echo "<h4>Hasil Pencarian \"<b>$cari</b>\":</h4>";
      ?>
      <div style="overflow-x:auto;">
      <table class="table table-hover table-responsive vtext table-striped">
      <thead>
      <tr class="bg-primary">
      <th>#</th>
      <th>Username</th>
      <th>Real Name</th>
      <th>Locations</th>
      <th>Level</th>
      <th>Actions</th>
      </tr>
      </thead>
      <?php
        while($data=mysqli_fetch_array($ambil)){
          if($data['username']!=$username && $data['level']!=$pre){
            $k++;
            if($data['level']==2)
            	$jls="Cabang";
            elseif ($data['level']==3)
            	$jls="Petugas";
            else
            	$jls="ERR";
            echo "<tr>
            <td>$k</td>
            <td>$data[username]</td>
            <td>$data[realname]</td>
            <td>$data[locations]</td>
            <td>$jls</td>
            <td><a href='./edit.php?user=$data[username]' title='Mengatur akun: \"$data[realname]\"' class='btn btn-primary btn-sm vtext'><span class='glyphicon glyphicon-edit'></span><i>&nbsp;Manage</i></a></td>
            </tr>";
          }
        }
        if($k!=0&&$shw==1)
        	echo "<tr><td colspan='6' align='center'><a href='./manuser.php' title='Kembali'>&#171;Kembali..</a></td></tr>";
        if($k==0){
        		if(isset($_GET['search']))
        			echo "<tr><td colspan='6' align='center'><h1><span class='text-muted glyphicon glyphicon-search'></span></h1><h3>&nbsp;Pengguna Tidak Ditemukan!</h3><a href='./manuser.php' title='Kembali..'>&#171;Kembali..</a><br /></td></tr>";
        		else
          		echo "<tr><td colspan='6' align='center'><h1><span class='text-muted glyphicon glyphicon-user'></span></h1><h3>Pengguna Belum Ada!</h3><a href='$z' title='Membuat Pengguna Baru!' class='btn btn-default'>Buat baru disini!</a><br /></td></tr>";
        }
      ?>
    </thead>
    </table>
	</div>
    <div class="bwh">
		<p><strong><?php echo "$appnam <i>$ver</i>"; ?></strong> <b>-</b> <i>PDAM &amp; POLINDRA &#169; <?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?></i></p>
	</div>
  </div>
</body>
</html>
