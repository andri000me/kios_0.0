<?php

 function xsql($query = null, $x= null){
     if($query == null || empty($query)){
         die('Data Query Tidak Ada');
     }
     if($x == null){
         die('varibel x tidak dimasukan dalam parameter ke 2'); 
     }
    $sql = mysqli_query($x, $query) or die('TIDAK DAPAT TERHUBUNG DENGAN KONEKSI DATABASE');
    return $sql;
 }

 function xnum_r($query = null){
    if($query == null || empty($query)){
        die('tidak ada parameter sehinggan tidak bisa menggunakan mysqli_num_rows');
    }
    $sql = mysqli_num_rows($query);
    return $sql;
 }
 function xfetch_a($query = null){
    if($query == null || empty($query)){
        die('tidak ada parameter sehinggan tidak bisa menggunakan mysqli_num_rows');
    }
    $sql = mysqli_fetch_array($query);
    return $sql;
 }
 function xfetch_r($query = null){
    if($query == null || empty($query)){
        die('tidak ada parameter sehinggan tidak bisa menggunakan mysqli_num_rows');
    }
    $sql = mysqli_fetch_row($query);
    return $sql;
 }
 function xclose($x = null){
      if(empty($x) || $x == null){
        die('varibel x tidak dimasukan'); 
      }
      return mysqli_close($x);
 }
?>