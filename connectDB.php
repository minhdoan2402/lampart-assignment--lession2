<?php 
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, NAMEDB);
    if ($conn->connect_error) {
        die("connection failed !!!" . $conn->connect_error);
    }

    mysqli_set_charset($conn, "utf8");  
?>