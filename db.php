<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'gallery';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Terhubung ke Database');
    if ($conn->connect_error) {
      die ("Connection failed : " .$conn->connect_error);
    }
?>
