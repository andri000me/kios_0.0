<?php 
include "init.php";

if(fform_req("POST")){
// proses jika sudah submit form field
	
if(empty($_POST['uname']) || empty($_POST['pass'])){
	// cek kosong atau tidak
	fsesi_setflash('invalid', ' Username/Password ada yg kosong ');
	header("location:../login.php?pesan=gagal")or die(mysql_error());
}
if(fform_az09($_POST['uname']) || fform_az09($_POST['pass']) ){
	//  Hanya huruf alphabet dan number yang diizinkan
	fsesi_setflash('invalid', ' Hanya huruf alphabet dan numeric yang diizinkan ');
	header("location:../login.php?pesan=gagal")or die(mysql_error());
}
$uname = fform($_POST['uname']);
$pass  =  fform($_POST['pass']);

$query = xsql("SELECT * from tbl_admin where uname='".$uname."' and pass='".md5($pass)."'", $x);
$rsquery = xfetch_a($query);
if(xnum_r($query)==1){
	// $_SESSION['uname']=$uname;
	fsesi('uname', $uname);
	fsesi('id', $rsquery['id']);
	xclose($x);
	header("location:../index.php");
}else{
	xclose($x);
	fsesi_setflash('invalid', ' Username dan Password Salah ');
	header("location:../login.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
}else{
	xclose($x);
	fsesi_setflash('invalid', ' usahakan login menggunakan form ');
	header("location:../login.php?pesan=gagal")or die(mysql_error());
}
xclose($x);
// https://www.codepolitan.com/cara-membuat-form-validasi-php-5982e850414f2
?>