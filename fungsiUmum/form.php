<?php 
    function fform_req($variabelString){
        if($_SERVER["REQUEST_METHOD"] == $variabelString){
            return true;
        }
        return false;
    }
    function fform($post){
      $menghilankanTagHTML =   Htmlentities($post);
      $menghilangkanSpaceDiawalDanDiakhir = trim($menghilankanTagHTML);
      return $menghilangkanSpaceDiawalDanDiakhir;
    }
    function fform_az09($post){
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$post)) {
            // jika tidak sama dengan regex = iya
            return true;
      }   
      return false;
    }
    function fform_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // jika tidak sama dengan email = iya
            return true;
      }   
      return false;
    }

?>