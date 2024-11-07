<?php  
    $server = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'projects';
    $con = mysqli_connect($server, $username, $password, $database);

    // Create connection
    $conn = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>