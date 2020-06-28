<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
// $periksa=xsql($connect, "SELECT * from barang where jumlah <=3");
// while($q=mysqli_fetch_array($periksa)){	
// 	if($q['jumlah']<=3){	
// 		?>	
 		<script>
// 			$(document).ready(function(){
// 				$('#pesan_sedia').css("color","red");
// 				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
// 			});
// 		</script>
		<?php
// 		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
// 	}
// }
?>
<?php 
$per_hal=10;
$jumlah_record=xsql("SELECT * from barang",$x);
$jum=xnum_r($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['pagination'])) ? (int)$_GET['pagination'] : 1;
$start = ($page - 1) * $per_hal;

?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="proses/p_laporan_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="barang.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-4">Nama Barang</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Jumlah</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($x, $_GET['cari']);
		$brg=xsql("SELECT * from barang where nama like '$cari%' or jenis like '$cari%'",$x);
	}else{

		$brg=xsql("SELECT * from barang limit $start, $per_hal",$x);
	}
	$no=1;
	while($b=xfetch_a($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo Rp($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a href="barang_detail.php?id=<?php echo $b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="barang_edit.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='proses/p_hapus_barang.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
		
			$modal=xsql("SELECT sum(modal) as total from barang",$x);	
			$rsmodal=xfetch_a($modal);			
			echo "<b> Rp.". Rp($rsmodal['total']).",-</b>";		
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($modal=1;$modal<=$halaman;$modal++){
				?>
				<li><a href="?pagination=<?php echo $modal ?>"><?php echo $modal ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="proses/p_tambah_barang.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>