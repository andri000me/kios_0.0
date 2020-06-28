<?php
    $hostName ="localhost";
    $userName ="root";
    $password = "";
    $dbName = "db_kios_00";

    $x = mysqli_connect($hostName, $userName, $password, $dbName);
    date_default_timezone_set("Asia/Bangkok");
    // session_start();
?>