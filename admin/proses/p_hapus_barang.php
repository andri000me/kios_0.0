<?php
require 'init.php';
// cek udah login belom
fsesi_login();

$id=mysqli_escape_string($x, $_GET['id']);
xsql("DELETE from barang where id='$id'", $x);
xclose($x);
header("location:../barang.php");

?>