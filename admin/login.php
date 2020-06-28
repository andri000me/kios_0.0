<?php 

include "../fungsiUmum/init.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>KIOS | LOGIN</title>
    <link rel="shortcut icon" href="../assets/gambar/1.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css"> -->
	<!-- <script type="text/javascript" src="../assets/js/jquery.js"></script> -->
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<!-- <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script> -->
	<style>
        .text-white{
  color:#fff;
}
 .mt-1{
     margin-top:1%;
 }
 .mt-2{
     margin-top:2%;
 }
 .mt-3{
     margin-top:3%;
 }
 .mt-4{
     margin-top:4%;
 }
 .mt-5{
     margin-top:5%;
 }
 body{
	background: url('../assets/gambar/3.jpg') left center no-repeat;
	background-size : 30% 70%;
 }
	</style>
</head>
<body>	
    <div style="margin-bottom:-1.5%;"></div>
    <div class="" style="background:#e3e3e3;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1 class="text-white" >&nbsp;</h1>
        <h3>&nbsp;</h3>
    </div>
	<div class="container">
		<?php 
		// bebas pilih
		// -------------1
		// if(isset($_GET['pesan'])){
		// 	if($_GET['pesan'] == "gagal"){
		// 		echo "<div style='margin-bottom:-55px;text-align:center' class='alert ' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
		// 	}
		// }
		// ------------2
			// if(isset($_GET['pesan'])){
			// 	fget($_GET['pesan'],'gagal','Login Gagal !! Username dan Password Salah !!', 'danger');
			// }
			
		//--------------3   
		fsesi_flash();
	   ?>
        <div class="mt-5"></div>
		<div class="mt-3">
			<form action="proses/p_login.php" method="post" autocomplete="off">
				<div class="col-md-4 col-md-offset-4  kotak">
					<center>
                        <img src="../assets/gambar/1.png" alt="" class="img-thumbnail" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    </center>

					<div class="input-group mt-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10%;">
						<span class="input-group-addon text-uppercase">Username : </span>
						<input type="text" class="form-control"  name="uname"  >
					</div>
					<div class="input-group mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10%;">
						<span class="input-group-addon text-uppercase" >Password :</span>
						<input type="password" class="form-control"  name="pass">
					</div>
					<div class="input-group mt-5" style="background:#e3e3e3;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10%;">			
						<button class="btn btn-success text-capitalize">click to login</button>
						&nbsp;&nbsp;
						<button type="reset" class="btn btn-danger text-capitalize">reset</button>
					</div>
				</div>
			</form>
		</div>
    </div>
    <br><br>  <br>
    <div class="" style="background:#e3e3e3; margin-top:7.6%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <h1 class="text-white" >&nbsp;</h1>
        <h3>&nbsp;</h3>
    </div>
	<?php
	 fsesi_close();
	?>
</body>
</html>