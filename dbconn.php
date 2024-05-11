<?php
    // $host = 'localhost:4306';
    // $username = 'root';
    // $dbpassword = '12345';
    // $database = 'formdata';

    $host = '192.168.0.103';
    $username = 'root';
    $dbpassword = 'example';
    $database = 'formdata';


    $port = '4306'; // Replace '3306' with your MySQL port


    $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>