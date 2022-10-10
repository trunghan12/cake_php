<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cakes";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database) or die("Lỗi kết nối");
    return $conn;
?>