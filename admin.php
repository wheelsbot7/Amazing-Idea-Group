<?php
session_start();

require "dbconnection.php";


$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit("Access Denied! You don't have permission to log in");
}

if ($qry = $conn->prepare("SELECT username, password FROM users WHERE username = ?")) {
    $qry->bind_param("s", $_POST["username"]);
    $qry->execute();
    $qry->store_result();

    if ($qry->num_rows > 0) {
        $qry->bind_result($id, $password);
        $qry->fetch();
        
        if ($password == $row['password']) {
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["name"] = $_POST["username"];
            $_SESSION["id"] = $id;
            
            header("Location: tempTable.php");
        }
        else {
            header("Location: login.php");
        }
    } else {
        echo "Incorrect username, try again.";
        header("Location: login.php");
    }
    $qry->close();
    

} else {
    echo "Incorrect username or password, try again.";
    header("Location: login.php");
}

$conn->close();

exit();
?>
