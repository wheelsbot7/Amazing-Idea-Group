<?php
// Database connection
include "dbconnection.php";

// Get the ID of the entry to edit (passed via GET)
if (isset($_GET['tempID'])) {
    $editID = $_GET['tempID'];

    // Retrieve the data from the database
    $sql = "SELECT * FROM pending WHERE tempID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

?>

<!-- HTML form for editing the entry -->
<form method="post" action="editIdea.php?id=<?php echo $row['tempID']; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="Placeholder" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['userEmail']; ?>" required>

    <label for="fields">Fields:</label>
    <input type="text" id="fields" name="fields" value="<?php echo $row['subject']; ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo $row['comment']; ?></textarea>

    <button type="submit" name="submit">Update Entry</button>
</form>


<?php
// Database connection
include "dbconnection.php";

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the updated data from the form
    $editID = $_GET['tempID']; // Get the ID from the URL
    $name = $_POST['tempName'];
    $email = $_POST['userEmail'];
    $fields = $_POST['tempFields'];
    $description = $_POST['tempDesc'];

    // Prepare the SQL update query
    $sql = "UPDATE pending SET name = ?, email = ?, fields = ?, description = ? WHERE tempID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $fields, $description, $editID);

    // Execute the update query
    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

