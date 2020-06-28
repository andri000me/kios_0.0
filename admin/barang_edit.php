<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysqli_real_escape_string($x, $_GET['id']);
$det=xsql("SELECT * from barang where id='$id_brg'",$x)or die(mysqli_error());
while($d=xfetch_a($det)){
?>					
	<form action="proses/p_update_barang.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?= $d['id']; ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>"></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><input type="text" class="form-control" name="jenis" value="<?= $d['jenis']; ?>"></td>
			</tr>
			<tr>
				<td>Suplier</td>
				<td><input type="text" class="form-control" name="suplier" value="<?= $d['suplier']; ?>"></td>
			</tr>
			<tr>
				<td>Modal</td>
				<td><input type="text" class="form-control" name="modal" value="<?= $d['modal']; ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?= $d['harga']; ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>