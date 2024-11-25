<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();

require "includes/header.php";
require "dbconnection.php";

$username = $password = $confirmPassword = "";
$registrationError = $registrationSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $registrationError = "Passwords do not match.";
    } else {
        $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $registrationError = "Username already exists.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashedPassword);
            if ($stmt->execute()) {
                $registrationSuccess = "Registration successful! You can now log in.";
                header("Location: login.php");
                exit;
            } else {
                $registrationError = "Error! Please try again.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>

<link rel="stylesheet" href="css/design.css">
<link rel="stylesheet" href="css/w3.css">
<meta charset="utf-8">
<div class="w3-padding-16" id="submit">
    <div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
        <span class="w3-row w3-center w3-dark-grey w3-padding-16 w3-xlarge">Create an Account</span>
    </div>
    <div class="w3-row w3-center w3-large">
        <p>Registration Page</p>

        <?php if ($registrationError): ?>
            <div class="w3-text-red">
                <p><?php echo $registrationError; ?></p>
            </div>
        <?php endif; ?>
        
        <?php if ($registrationSuccess): ?>
            <div class="w3-text-green">
                <p><?php echo $registrationSuccess; ?></p>
            </div>
        <?php endif; ?>
        
        <form action="register.php" method="post" style="text-align: left">
            <label for="username"><b>Username: </b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="password"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <label for="confirm_password"><b>Confirm Password: </b></label>
            <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>

            <input type="submit" value="Register">
        </form>
    </div>
</div>

<?php
require "includes/footer.php";
?>