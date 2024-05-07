<?php
    // $host = 'localhost:4306';
    // $username = 'root';
    // $dbpassword = '12345';
    // $database = 'formdata';

    $host = 'localhost:8080';
    $username = 'root';
    $dbpassword = 'example';
    $database = 'formdata';
    

    $conn = new PDO("mysql:host=$host;dbname=$database",$username,$dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>