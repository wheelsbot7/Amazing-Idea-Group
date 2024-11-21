<form method="post" action="insertData.php">
    <label for="name">Name:</label>
    <input type="text" id="insertions" name="insertName" required>
    
    <label for="email">Email:</label>
    <input type="email" id="insertions" name="userEmail" required>
    
    <label for="fields">Fields:</label>
    <input type="text" id="insertions" name="insertFields" required>
    
    <label for="description">Description:</label>
    <textarea id="insertions-DESC" name="insertDesc" required></textarea>
    
    <button type="submit">Add Data</button>
</form>

<?php
// Database connection
include "../dbconnection.php";



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $insertName = htmlspecialchars($_POST['insertName']);
    $insertFields = htmlspecialchars($_POST['insertFields']);
    $insertDesc = htmlspecialchars($_POST['insertDesc']);

    // Prepare SQL query
    $sql = "INSERT INTO pending (email, name, subject, comment) VALUES ('$userEmail', '$insertName','$insertFields', '$insertDesc')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
