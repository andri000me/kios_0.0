<?php 
	require '../db/init.php';
	require '../fungsiUmum/init.php';
	fsesi_login();
	?>
<!DOCTYPE html>
<html>
<head>
	<title>KIOS | 0.0</title>
	<link rel="shortcut icon" href="../assets/gambar/1.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
	<style>
	body{
		background-image: url('../assets/gambar/4.jpg');
		background-position: right top;
        background-repeat: no-repeat;
		background-size : 36%,20%;
	}
	</style>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<h3> <b>KIOS</b> 0.0 </h3>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
				<?php 
				$periksa=xsql("SELECT * from barang where jumlah <=3",$x);
				$q=xnum_r($periksa);
				if($q <= 3){ ?>
					<li ><a id="pesan_sedia" href="#" class="text-danger"  data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment text-danger'></span> <?= $q; ?> Pesan </a></li>
					<li ><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php 
					echo $_SESSION['uname'].' | '.$_SESSION['id'];  
					?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				<?php } else{	?>
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php 
					echo $_SESSION['uname'].' | '.$_SESSION['id'];  
					?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
					<?php  } ?>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=xsql("SELECT * from barang where jumlah <=3",$x);
					while($q=xfetch_a($periksa)){	
						if($q['jumlah']<=3){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="barang.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</a></li>
			<li><a href="entry.php"><span class="glyphicon glyphicon-briefcase"></span>  Entry Penjualan</a></li>        												
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="proses/p_logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">