<?php 
require 'init.php';
// cek udah login belom
fsesi_login();

$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

xsql("UPDATE barang set nama='$nama', jenis='$jenis', suplier='$suplier', modal='$modal', harga='$harga', jumlah='$jumlah' where id='$id'",$x);
xclose($x);
header("location:../barang.php");

?>