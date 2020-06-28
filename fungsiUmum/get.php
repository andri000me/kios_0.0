<?php 

    function fget($get = null,$nilaiBanding = null, $pesan = null, $warna= null){
        if($get == `` || $get == ` ` || $get == null){
         return 'kosong bosque';
        }else{
                if($get == $nilaiBanding){
                    switch(strtolower($warna)){
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
                    echo "<div style='margin-bottom:-55px;text-align:center' class='alert ".$warna." ' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>&nbsp;".ucwords($pesan)." </div>";
                }
        }
     
    
      
    }


?>