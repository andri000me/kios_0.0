<?php 

include 'init.php';
// cek udah login belom
fsesi_login();

$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

$dt=xsql("SELECT * from barang where nama='$nama'",$x);
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
xsql("UPDATE barang set jumlah='$sisa' where nama='$nama'",$x);

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
xsql("INSERT into barang_laku(tanggal, nama, jumlah, harga, total_harga, laba) values('$tgl','$nama','$jumlah','$harga','$total_harga','$labaa')",$x)or die(mysqli_error());
xclose($x);
header("location:../entry.php");

?>