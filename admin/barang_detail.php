<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($x, $_GET['id']);


$det=xsql("SELECT * from barang where id='$id_brg'",$x)or die(mysqli_error());
while($d=xfetch_a($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?= $d['nama']; ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?= $d['jenis']; ?></td>
		</tr>
		<tr>
			<td>Suplier</td>
			<td><?= $d['suplier']; ?></td>
		</tr>
		<tr>
			<td>Modal</td>
			<td>Rp.<?= Rp($d['modal']); ?>,-</td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>Rp.<?= Rp($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?= $d['jumlah']; ?></td>
		</tr>
		<tr>
			<td>Sisa</td>
			<td><?= $d['sisa']; ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>