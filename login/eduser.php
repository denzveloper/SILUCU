<?php
session_start();
include("./res.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PANEL <?php echo $appnam; ?> <?php echo $ver; ?></title>
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/styles.css">
	<style>
		body {
			background-color:#eee;
		}
		.row {
			margin:100px auto;
			width:300px;
			text-align:center;
		}
		.login {
			background-color:#fff;
			padding:20px;
			margin-top:20px;
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
              <a class="navbar-brand" href="#"><?php echo $appnam; ?></a>
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
					          <li class="active"><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li><a href="<?php echo $y;?>">Akun Manager</a></li>
                    <li><a href="<?php echo $z;?>">Buat akun baru</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Log Keluar</li>
                    <li><a href="logout.php" onclick="return confirm('<?php echo "$user.";?> Yakin, ingin keluar dari <?php echo $appnam ?>?')"><?php echo "$user";?></a></li>
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
    if(isset($_POST['update'])){
      $pass = $_POST['pass'];
      $pass = hashing($pass);
      if($sandi==$pass){
          $nama = $_POST['name'];
          $lokasi = ucfirst($_POST['locations']);
          //Password
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];
          $pass = hashing($pass1);
          if($pass1==$pass2){
              $ok=mysqli_query($koneksi, "UPDATE users SET realname='$nama', locations='$lokasi', password='$pass' WHERE $id");
              if($ok){
                echo '<div class="alert alert-success"><b>Berhasil!</b><br>Pengguna "'.$username.'" Telah berhasil diperbarui!</div>';
              }
              else{
                echo '<div class="alert alert-danger"><b>Galat!</b><br />Maaf, Ada kesalahan terjadi!<br /><i>Coba Lagi nanti..</i></div>';
              }
          }
          else{
            echo '<div class="alert alert-danger"><b>Galat memperbarui!</b><br />Kedua password tidak cocok!</div>';
          }
        }
        else{
          echo '<div class="alert alert-danger"><b>Galat memperbarui!</b><br />Password lama tidak cocok!</div>';
        }
      }
    ?>
	 <form role="form" action="" method="post">
		 <div class="col-lg-9">
		 <label class="control-label">Edit data</label>
	 <div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" value="<?php echo $uname;?>" class="form-control" placeholder="Username" disabled/>
        <input type="text" name="name" value="<?php echo $nama;?>" class="form-control" placeholder="Real Name" required autofocus/>
        <input type="text" name="locations" value="<?php echo $lokasi;?>" class="form-control" placeholder="Address" required autofocus/>
        <input type="password" name="pass" class="form-control" placeholder="Last Password" required autofocus/>
        <input type="password" name="pass1" class="form-control" placeholder="New Password" required autofocus/>
        <input type="password" name="pass2" class="form-control" placeholder="Re-Type New Password" required autofocus/>
	</div>
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="text" name="access" value="Hak Akses: &quot;<?php echo $account;?>&quot;" class="form-control" placeholder="Hak akses" disabled/>
	</div>
  <div class="input-group">

  </div>
	</div>
	<div class="col-lg-2">
		<label class="control-label">&nbsp;</label>
        <button type="submit" name="update" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-send"></span>&nbsp;Simpan</button>
        <button type="reset" name="reset" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset</button>
	</div>
     </form>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>