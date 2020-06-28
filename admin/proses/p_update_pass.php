<?php
include 'init.php';
// cek udah login belom
fsesi_login();

$id=$_POST['id'];
$lama=md5($_POST['lama']);
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=xsql("SELECT * from tbl_admin where pass='$lama' and id='$id'", $x);
if(xnum_r($cek)==1){
	if($baru==$ulang){
		$b = md5($baru);
		xsql("UPDATE tbl_admin set pass='$b' where id='$id'",$x);
		xclose($x);
		header("location:../ganti_pass.php?pesan=oke");
	}else{
		xclose($x);
		header("location:../ganti_pass.php?pesan=tidaksama");
	}
}else{
	xclose($x);
	header("location:../ganti_pass.php?pesan=gagal");
}
xclose($x);
?>