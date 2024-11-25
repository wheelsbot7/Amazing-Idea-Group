<head>
    <title>Submit New Idea</title>
</head>
<body>
    <h1>Enter New Idea Information Below:</h1>
    <form method="post" action="newIdea.php">
        <label for="name">Name:</label>
        <input type="text" id="insertions" name="insertName" required>
        
        <label for="email">Email:</label>
        <input type="email" id="insertions" name="userEmail" required>
        
        <label for="fields">Fields:</label>
        <input type="text" id="insertions" name="insertFields" required>
        
        <label for="description">Description:</label>
        <textarea id="insertions-DESC" name="insertDesc" required></textarea>
        
        <!-- Button submits and redirects to a success page -->
        <button type="submit">Add Data</button>
    </form>
</body>

<?php
// Database connection
include "dbconnection.php";

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
    $sql = "INSERT INTO pending (email, name, subject, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userEmail, $insertName, $insertFields, $insertDesc);

    // Execute query and handle response
    if ($stmt->execute()) {
        // Redirect to a success page with confirmation
        header("Location: tempTable.php?name=" . urlencode($insertName));
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
