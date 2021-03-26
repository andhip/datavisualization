<?php 
    $db = mysqli_connect('localhost', 'root', '', 'datawarehouse');
    if(!$db){
        die("Gagal Terhubung ke database : ". mysqli_connect_error());
    }

?>