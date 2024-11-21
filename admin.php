<?php
require "dbconnection.php";

session_start();

$conn = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please complete the registration form!');
}

if ($qry = $conn->prepare("SELECT adminID, password FROM users WHERE username = ?")) {
    $qry->bind_param("s", $_POST["username"]);
    $qry->execute();
    $qry->store_result();

    if ($qry->num_rows > 0) {
        $qry->bind_result($id, $password);
        $qry->fetch();
        
        if (password_verify($_POST["password"], $password)) {
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["name"] = $_POST["username"];
            $_SESSION["id"] = $id;
            
            header("Location: ../../../Amazing-Idea-Group/tempTable.php");
        }
        else {
            header("Location: ../../../Amazing-Idea-Group/login.php");
        }
    } else {
        echo "Incorrect username, try again.";
        header("Location: ../../../Amazing-Idea-Group/login.php");
    }
    $qry->close();
    

} else {
    echo "Incorrect username or password, try again.";
    header("Location: ../../../Amazing-Idea-Group/login.php");
}

$conn->close();

exit();
?>
