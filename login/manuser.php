<?php
include("./res.php");
if($pre>2)
  header("Location: ./index.php");
$ambil=mysqli_query($koneksi, "SELECT * FROM users");
$k=0;
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					          <li><a href="<?php echo $x;?>">Edit Profil</a></li>
                    <li class="active"><a href="<?php echo $y;?>">Akun Manager</a></li>
                    <li><a href="<?php echo $z;?>">Buat akun baru</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Log Keluar</li>
                    <li><a href="logout.php" onclick="return confirm('<?php echo $nama;?> Yakin, ingin keluar dari <?php echo $appnam ?>?')"><?php echo $nama;?></a></li>
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
    		<div class="col-lg-3">
    		<input type="text" name="cari" class="form-control" placeholder="Cari.." />
    		</div>
    		<div class="col-lg-2">
    		<button type="submit" name="search" class="btn btn-success btn-block"><span class="glyphicon glyphicon-search"></span>&nbsp;Cari!</button>
    		</div>
    	</form>
    	</div>
      <br />
      <table class="table table-hover table-responsive">
      <thead>
      <tr class="bg-primary">
      <th>#</th>
      <th>Username</th>
      <th>Real Name</th>
      <th>Locations</th>
      <th>Actions</th>
      </tr>
      </thead>
      <?php
      	if(isset($_GET['search'])&&isset($_GET['cari'])){
      		$cari=$_GET['cari'];
      		//Fuzzy Search Algorithm
      		$ambil=mysqli_query($koneksi, "SELECT * FROM users WHERE username LIKE '%$cari%' OR realname LIKE '%$cari%' OR locations LIKE '%$cari%'");
      	}
        while($data=mysqli_fetch_array($ambil)){
          if($data['username']!=$username && $data['level']!=$pre){
            if($data['locations']==$lokasi && $data['level']>$pre){
            $k++;
            echo "<tr>
            <td>$k</td>
            <td>$data[username]</td>
            <td>$data[realname]</td>
            <td>$data[locations]</td>
            <td><a href='./edit.php?user=$data[username]' title='Manage User' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span><i>&nbsp;Manage</i></a></td>
            </tr>
            ";
            }
            else if($pre==1){
            $k++;
            echo "<tr>
            <td>$k</td>
            <td>$data[username]</td>
            <td>$data[realname]</td>
            <td>$data[locations]</td>
            <td><a href='./edit.php?user=$data[username]' title='Manage User' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span><i>&nbsp;Manage</i></a></td>
            </tr>
            ";}
          }
        }
        if($k!=0&&isset($_GET['search'])){
        	echo "<tr><td colspan='5' align='center'><a href='./manuser.php' title='Kembali'>&#171;Kembali..</a></td></tr>";
        }
        if($k==0){
        		if(isset($_GET['search'])){
        			echo "<tr><td colspan='5' align='center'><h1><span class='text-muted glyphicon glyphicon-search'></span></h1><h3>&nbsp;Pengguna Tidak Ditemukan!</h3><br /><a href='./manuser.php' title='Kembali..'>&#171;Kembali..</a></td></tr>";
        		}
        		else{
          		echo "<tr><td colspan='5' align='center'><h1><span class='text-muted glyphicon glyphicon-user'></span></h1><h3>Pengguna Belum Ada!</h3><br /><a href='$z' title='Membuat Pengguna Baru!' class='btn btn-default'>Buat baru disini!</a></td></tr>";
        		}
        }
      ?>
    </thead>
    </table>
  </div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
