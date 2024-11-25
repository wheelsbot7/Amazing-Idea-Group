<?php
// Database connection
include "dbconnection.php";

// Check if tempID is passed via GET
if (isset($_GET['tempID'])) {
    $editID = $_GET['tempID'];

    // Retrieve the data from the database
    $sql = "SELECT * FROM pending WHERE tempID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $editID); // Bind the tempID as an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the entry
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found for tempID: " . htmlspecialchars($editID);
        exit;
    }
} else {
    echo "No tempID provided.";
    exit;
}
?>

<!-- HTML form for editing the entry -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Idea</title>
</head>
<body>

<h1>Edit Idea</h1>

<form method="post" action="editIdea.php?tempID=<?php echo htmlspecialchars($row['tempID']); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="tempName" value="<?php echo htmlspecialchars($row['name']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="userEmail" value="<?php echo htmlspecialchars($row['email']); ?>" required>

    <label for="fields">Fields:</label>
    <input type="text" id="fields" name="tempFields" value="<?php echo htmlspecialchars($row['subject']); ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="tempDesc" required><?php echo htmlspecialchars($row['comment']); ?></textarea>

    <!-- Redirects to a confirmation or success page after submission -->
    <button type="submit" name="submit">Update Entry</button>
</form>

</body>
</html>

<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the updated data from the form
    $name = $_POST['tempName'];
    $email = $_POST['userEmail'];
    $fields = $_POST['tempFields'];
    $description = $_POST['tempDesc'];

    // Prepare the SQL update query
    $sql = "UPDATE pending SET name = ?, email = ?, subject = ?, comment = ? WHERE tempID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $fields, $description, $editID);

    // Execute the update query
    if ($stmt->execute()) {
        // Redirect to a success page after the update
        header("Location: tempTable.php?tempID=" . htmlspecialchars($editID)); // Change to your desired page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
