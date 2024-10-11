<?php  
    $server = 'localhost';
    $username = 'u413142534_inspire';
    $password = '';
    $database = 'u413142534_projects';
    $con = mysqli_connect($server, $username, $password, $database);
    if(mysqli_connecrt_errno()) {
        echo "Connection Error" . mysql_connect_error();
    }
?>