<?php
include("./res.php");
if($pre>2)
  header("Location: ./index.php");
$usrnm = "";
$nambar = "";
$tpt = "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PANEL <?php echo $appnam; ?> <?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	<style>
		body {
			background-color: #eee;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
                <li><a href="<?php echo $a;?>">Menu 1</a></li>
                <li><a href="<?php echo $b;?>">Menu 2</a></li>
                <li><a href="<?php echo $c;?>">Menu 3</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "$user"; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					          <li><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li><a href="<?php echo $y;?>">Akun Manager</a></li>
                    <li class="active"><a href="<?php echo $z;?>">Buat akun baru</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Log Keluar</li>
                    <li><a href="logout.php" onclick="return confirm('<?php echo $user;?> Yakin, ingin keluar dari <?php echo $appnam ?>?')"><?php echo "$user";?></a></li>
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
    if(isset($_POST['create'])){
          $usrnm = addslashes(trim($_POST['username']));
          $nambar = strtoupper($_POST['name']);
          if($pre==1){
            $tpt= ucfirst($_POST['locations']);}
          else{
            $tpt = $lokasi;
          }
          $akses = $_POST['access'];
          //Password
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];
          $pass = hashing($pass1);
          if($pass1==$pass2){
            if($akses<4 && $akses>0 && $pre==1){
              $ok=mysqli_query($koneksi, "INSERT INTO users (id, username, realname, locations, password, level) VALUES (NULL, '$usrnm', '$nambar', '$tpt', '$pass', '$akses')");
              if($ok){
                echo '<div class="alert alert-success"><b>Berhasil!</b><br />Pengguna "'.$usrnm.'" Telah berhasil dibuat!</div>';
                $usrnm = "";
                $nambar = "";
                $tpt = "";
              }
              else{
                echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
              }
            }
            else if($akses==3 && $pre==2){
              $ok=mysqli_query($koneksi, "INSERT INTO users (id, username, realname, locations, password, level) VALUES (NULL, '$usrnm', '$nambar', '$tpt', '$pass', '$akses')");
              if($ok){
                echo '<div class="alert alert-success"><b>Berhasil!</b><br />Pengguna "'.$usrnm.'" Telah berhasil dibuat!</div>';
                $usrnm = "";
                $nambar = "";
                $tpt = "";
              }
              else{
                echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
              }
            }
            else{
              echo '<div class="alert alert-danger"><b>Galat saat membuat!</b><br />Hak Akses Tidak dapat diterima!</div>';
            }
          }
          else{
            echo '<div class="alert alert-danger"><b>Galat saat membuat!</b><br />Kedua Password(Kata sandi) tidak cocok!</div>';
          }
    }
    ?>
	 <form role="form" action="" method="post">
		 <div class="col-lg-9">
		 <label class="control-label">Informasi dasar</label>
	 <div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" value="<?php echo $usrnm;?>" class="form-control" placeholder="Username" required autofocus/>
        <input type="text" name="name" value="<?php echo $nambar;?>" class="form-control" placeholder="Real Name" required autofocus/>
        <?php if($pre==1){ echo "<input type='text' name='locations' value='$tpt' class='form-control' placeholder='Address' required autofocus/>";} ?>
        <input type="password" name="pass1" class="form-control" placeholder="Password" required autofocus/>
        <input type="password" name="pass2" class="form-control" placeholder="Repeat password" required autofocus/>
	</div>
		 <label class="control-label">Hak Akses User</label>
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<select name="access" class="form-control" required autofocus>
        <option value="0">-</option>
        <option value="1" <?php if($pre!=1) echo "disabled";?>>Super User</option>
        <option value="2" <?php if($pre!=1) echo "disabled";?>>Admin Cabang</option>
        <option value="3">Petugas Pengisian Data</option>
		</select>
	</div>
  <div class="input-group">

  </div>
	</div>
	<div class="col-lg-2">
		<label class="control-label">&nbsp;</label>
        <button type="submit" name="create" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Simpan</button>
        <button type="reset" name="reset" class="btn btn-info btn-block"><span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset</button>
	</div>
     </form>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>