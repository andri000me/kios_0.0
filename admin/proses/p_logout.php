<?php 
    include '../../fungsiUmum/init.php';
    // cek udah login belom
    fsesi_login();
    
    fsesi_close();
    header("location:../login.php");
?>