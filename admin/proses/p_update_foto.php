<?php 
include 'init.php';
// cek udah login belom
fsesi_login();

$user=$_POST['user'];
$foto=$_FILES['foto']['name'];


$size   = $_FILES['foto']['size'];
$error  = $_FILES['foto']['error'];
$asal   = $_FILES['foto']['tmp_name'];


$format = pathinfo($foto, PATHINFO_EXTENSION);

if($error === 0){

  if ($size > 9000){ 
  
		if($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG" ){
			$u=xsql("SELECT * from tbl_admin where uname='$user'",$x);
			$us=mysqli_fetch_array($u);
			if(file_exists("foto/".$us['foto'])){
				unlink("foto/".$us['foto']);
				move_uploaded_file($asal, "../foto/".$us['id']."_".$us['uname']."_".$_FILES['foto']['name']);
				$foto = $us['id']."_".$us['uname']."_".$_FILES['foto']['name'];
				xsql("UPDATE tbl_admin set foto='$foto' where uname='$user'",$x);
				header("location:../ganti_foto.php?pesan=oke");
			}else{
				move_uploaded_file($asal, "../foto/".$us['id']."_".$us['uname']."_".$_FILES['foto']['name']);
				$foto = $us['id']."_".$us['uname']."_".$_FILES['foto']['name'];
				xsql("UPDATE tbl_admin set foto='$foto' where uname='$user'",$x);
				header("location:../ganti_foto.php?pesan=oke");
			}
	
		}else{
		  echo "Maaf format filenya harus jpg/png ";
		}
  
	}else{
	  echo "file terlalu besar";
	}
}else "Ada kesalahan saat upload";


?>
