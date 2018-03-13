<?php
include("./res.php");
if($pre>2)
  header("Location: ./index.php");
$idpgn=$_GET['user'];
if($idpgn==$username)
  header("Location: ./eduser.php");
$ambil=mysqli_query($koneksi, "SELECT * FROM users where username='$idpgn'");
$data=mysqli_fetch_array($ambil);
if(!isset($data['username'])){
    header("Location: ./manuser.php");
}
$lvl=$data['level'];
$tkt=$lvl;
if($pre>=$tkt && $data['locations']!=$lokasi)
  header("Location: ./manuser.php");
if($lvl==2){
  $lvl="Admin Cabang";
}
elseif($lvl==3){
  $lvl="Petugas Isi Data";
}
else{
  header("Location: ./manuser.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USER EDIT <?php echo $appnam; ?> <?php echo $ver; ?></title>
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
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
    <!-- Atas-Bawah -->
    <div class="container marketing">
    <?php
    if(isset($_POST['baru'])){
      $namae = antiin(strtoupper($_POST['name']));
      if($pre==1){
      $lokasie = ucfirst($_POST['locations']);}
      //Password
      if($_POST['pass1']=="" && $_POST['pass2']==""){
      $pass1 = $data['password'];
      $pass2 = $pass1;
      $pass = $pass2;
      }else{
      $pass1 = strval($_POST['pass1']);
      $pass2 = strval($_POST['pass2']);
      $pass = hashing($pass1);
      }
      if($pre==1 && $pass1==$pass2){
        if($_POST['access']>1 && $_POST['access']<4){
          $tingkat=$_POST['access'];
        }
        else{
          $tingkat=$data['level'];
        }
        $ok=mysqli_query($koneksi, "UPDATE users SET realname='$namae', locations='$lokasie', password='$pass', level='$tingkat' WHERE username='$idpgn'");
        if($ok){
          echo '<div class="alert alert-success"><b>Berhasil!</b><br />Pengguna "'."$namae".'" Telah berhasil diperbarui!<br /></div>';
        }
        else{
          echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
        }
      }
      elseif($pre==2 && $pass1==$pass2){
        $ok=mysqli_query($koneksi, "UPDATE users SET realname='$namae', locations='$lokasi', password='$pass' WHERE username='$idpgn'");
        if($ok){
          echo '<div class="alert alert-success"><b>Berhasil!</b><br>Pengguna "'."$namae".'" Telah berhasil diperbarui!<br></div>';
        }
        else{
          echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
        }
      }else{
        echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
      }
    }
    if(isset($_POST['hapus'])){
      $namae=$data['realname'];
      if($tkt==2){
      $tpt=$data['locations'];
      $ok=mysqli_query($koneksi, "DELETE FROM users WHERE locations='$tpt' and level>1");
        if($ok){
          echo '<div class="alert alert-success"><b>Berhasil!</b><br />Pengguna "'."$namae".'" dan "'.$tpt.' Telah berhasil dihapus!</div><h4><b><a href="./manuser.php" title="Back to Manage User">&#171;Kembali</a></b></h4><meta http-equiv="refresh" content="3; url=./manuser.php">';
          }
          else{
          echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
       	  }
       	  exit;
       }
      if($tkt==3){
      $ok=mysqli_query($koneksi, "DELETE FROM users WHERE username='$idpgn'");
      if($ok){
          echo '<div class="alert alert-success"><b>Berhasil!</b><br />Pengguna "'."$namae".'" Telah berhasil dihapus!<br /><sub>Anda akan dialihkan kehalaman Manager User kembali.</sub></div><h4><b><a href="./manuser.php" title="Back to Manage User">&#171;Kembali</a></b></h4><meta http-equiv="refresh" content="3; url=./manuser.php">';
          exit;
        }
        else{
          echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
        }
      }
  	}
    ?>
	 <form role="form" action="" method="post">
	 	<h3><b>Edit data dari "<?php echo $data['realname']; ?>"</b></h3>
		<div class="col-lg-9">
		<h4>Menyuting Informasi</h4>
	 	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" value="<?php echo $data['username'];?>" class="form-control" placeholder="Username" disabled/>
        <input type="text" name="name" value="<?php echo $data['realname'];?>" class="form-control" placeholder="Real Name" required autofocus/>
        <?php if($pre==1){ echo "<input type='text' name='locations' value='$data[locations]' class='form-control' placeholder='Address' required autofocus/>";} ?>
        <input type="password" name="pass1" class="form-control" placeholder="New Password"/>
        <input type="password" name="pass2" class="form-control" placeholder="Re-Type New Password"/>
	</div>
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <?php if($pre==2){ echo'
    <input type="text" value="Hak Akses: &quot;';?><?php echo $lvl; echo '&quot;" class="form-control" placeholder="Hak akses" disabled/>';}
      if($pre==1){echo '
        <select name="access" class="form-control" required autofocus>
          <option value="0">-Tidak Berubah-</option>
          <option value="2"'; ?> <?php if($pre!=1) echo "disabled"; echo '>Admin Cabang</option>
          <option value="3">Petugas Pengisian Data</option>
        </select>';}
    ?>
	</div>
	</div>
	<div class="col-lg-2">
		<label class="control-label">Aksi</label>
        <button type="submit" name="baru" class="btn btn-success btn-block"><span class="glyphicon glyphicon-send"></span>&nbsp;Perbarui</button>
        <button type="reset" name="reset" class="btn btn-info btn-block"><span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset</button>
        <button type="submit" name="hapus" class="btn btn-danger btn-block" onclick="return confirm('Yakin menghapus Pengguna (<?php echo $data['realname'];?>)?')"><span class="glyphicon glyphicon-trash"></span>&nbsp;Tutup Akun</button>
        <br />
        </a>
     </form>
     <h4><b><a href='./manuser.php' title='Back to Manage User'>&#171;Kembali</a></b></h4>
 	</div>
     <div class="bwh">
		<p><strong><?php echo "$appnam <i>$ver</i>"; ?></strong> <b>-</b> <i>PDAM &amp; POLINDRA &#169; <?php echo $begin . (($begin != $now) ? '-' . $now : ''); ?></i></p>
	</div>
	</div>
</body>
</html>