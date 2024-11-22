<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();


require "includes/header.php";
require "dbconnection.php";

$username = $password = "";
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($password == $row['password']) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $row['username'];
            
            header("Location: tempTable.php");
            exit;
        } else {
            $loginError = "Invalid password. Access denied.";
        }
    } else {
        $loginError = "No one found with that username.";
    }
}

$conn->close();
?>

<link rel="stylesheet" href="css/design.css">
<link rel="stylesheet" href="css/w3.css">
<meta charset="utf-8">
<div class="w3-padding-16" id="submit">
    <div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
        <span class="w3-row w3-center w3-dark-grey w3-padding-16 w3-xlarge">Every Project Starts with an Idea</span>
    </div>
    <div class="w3-row w3-center w3-large ">
        <p>Login Page</p>
        <p>
        <form action="admin.php" method="post" style="text-align: left">
                <label for="username"><b>Username: </b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>

                <label for="password"><b>Password: </b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>

                <input type ="submit" value="Login">
            </form>
    </div>
</div>

<?php
require "includes/footer.php"
?>
