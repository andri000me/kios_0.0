<?php 
function fsesi($string,$variabel){
     $_SESSION[$string]=$variabel;
}
function fsesi_setflash($getisi,$pesan,$warna = ''){
     $_SESSION['fsesi_flash'] =  [
         'getisi' => $getisi,
         'pesan' => $pesan,
         'warna' => strtolower($warna) 
     ];
 }
 function fsesi_flash(){
    if(isset($_SESSION['fsesi_flash'])){
         switch($_SESSION['fsesi_flash']['warna']){
             case 'danger':
                 $warna = 'alert-danger';    
                 break;
             case 'warning':
                 $warna = 'alert-warning';
                 break;
             case 'info':
                 $warna = 'alert-info';
                 break;
             case 'success':
                 $warna = 'alert-success';
                 break;
             default:
                 $warna = '';
                 break;    
         }
 
         if(isset($_SESSION['fsesi_flash']['getisi'])){
                 echo "<div style='margin-bottom:-55px;text-align:center' class='alert ".$warna." ' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp;<b>".strtoupper( $_SESSION['fsesi_flash']['getisi'])."</b>:&nbsp;&nbsp;[".ucwords($_SESSION['fsesi_flash']['pesan'])."]</div>";
         }
         unset($_SESSION['fsesi_flash']);
    }else{
     //    echo 'tidak ada sesson';
    }
 }

 function fsesi_login(){
    if(!isset($_SESSION['uname']) || !isset($_SESSION['id'])){
        fsesi_setflash('warning', ' anda harus login terlebih dahulu ');
        header("location:http://localhost/kios_0.0/admin/login.php");
    }
 }
 function fsesi_close(){
  session_destroy();
 }
 if(!session_start())  fsesi_start();
?>