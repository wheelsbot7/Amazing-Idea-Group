<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();


require_once "includes/header.php";
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
        <form action="../../Amazing-Idea-Group/data_src/api/admin.php" method="post" style="text-align: left">
                <label for="username"><b>Username: </b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>

                <label for="password"><b>Password: </b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>

                <input type ="submit" value="Login">
            </form>
    </div>
</div>

<?php
require_once "includes/footer.php"
?>
