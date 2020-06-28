<?php 
include 'init.php';
// cek udah login belom
fsesi_login();

$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$suplier=$_POST['suplier'];
$modal=$_POST['modal'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];

xsql("INSERT into barang(nama, jenis, suplier, modal, harga, jumlah, sisa) values('$nama','$jenis','$suplier','$modal','$harga','$jumlah','$sisa')",$x);
xclose($x);
header("location:../barang.php");

 ?>