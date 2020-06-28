
<?php 
include 'header.php';
?>

<?php
// $a = mysqli_query($connect, "SELECT * from barang_laku");
?>

<div class="col-md-10">
	<h3>Selamat datang </h3>	
    <h3>Di Aplikasi Kios Admin Sederhana</h3>
    <h3>BY : WAT</h3>
    <div class="row">
        <div class="col-md-3">
        <?php 
			$use=$_SESSION['id'];
			$fo=xsql("SELECT foto from tbl_admin where id='$use'",$x);
			$f=xfetch_a($fo);
			if(!$f['foto'] == "" || !$f['foto'] == "" || !$f['foto'] == null){
				?>				

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php 
						echo $f['foto']; 
						?>">
					</a>
				</div>
				<?php 
			}
			?>		
        </div>
	</div>

<!-- kalender -->
<div class="pull-right">
	<!-- <div id="kalender">eee</div> -->
</div>

<?php 
include 'footer.php';

?>