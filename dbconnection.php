<?php  
    $server = '156.67.74.51';
    $username = 'u413142534_inspire';
    $password = 'WeN33dMoreIde@s!';
    $database = 'u413142534_projects';
    $con = mysqli_connect($server, $username, $password, $database);

    // Create connection
    $conn = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>