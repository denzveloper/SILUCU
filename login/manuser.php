<?php
session_start();
include("./res.php");
if($pre>2)
  header("Location: ./index.php");
$ambil=mysqli_query($koneksi, "SELECT * FROM users");
$k=0;
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
	<link href="../css/styles.css" rel="stylesheet">
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
                <li><a href="#">Home</a></li>
                <li><a href="<?php echo $a;?>">Menu 1</a></li>
                <li><a href="<?php echo $b;?>">Menu 2</a></li>
                <li><a href="<?php echo $c;?>">Menu 3</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "$user"; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					          <li><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li class="active"><a href="<?php echo $y;?>">Akun Manager</a></li>
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
  </div>
  <div class="container marketing">
    <div class="table-responsive">
      <label class="control-label">Manager Akun</label>
      <table class="table">
      <thead>
      <tr>
      <td>#</td>
      <td>Username</td>
      <td>Real Name</td>
      <td>Locations</td>
      <td>Acions</td>
      <?php
        while($data=mysqli_fetch_array($ambil)){
          if($data['id']!=$idus && $data['level']!=$pre){
            if($data['level']>$id && $data['locations']==$lokasi){
            $k++;
            echo "<tr>
            <td>$k</td>
            <td>$data[username]</td>
            <td>$data[realname]</td>
            <td>$data[locations]</td>
            <td><a href='./edit.php?idus=$data[id]' title='Manage User'><button>Manage</button></a></td>
            </tr>
            ";
            }
            else if($id==1){
            $k++;
            echo "<tr>
            <td>$k</td>
            <td>$data[username]</td>
            <td>$data[realname]</td>
            <td>$data[locations]</td>
            <td><a href='./edit.php?idus=$data[id]' title='Manage User'><button>Manage</button></a></td>
            </tr>
            ";}
          }
        }
      ?>
    </thead>
    </table>
    </div>
  </div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
