<?php
// Database connection
include "dbconnection.php";

// Check if tempID is passed via GET
if (isset($_GET['tempID'])) {
    $deleteID = $_GET['tempID'];

    // Prepare the SQL delete query
    $sql = "DELETE FROM pending WHERE tempID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteID);

    // Execute the delete query
    if ($stmt->execute()) {
        // Redirect to the table page after successful deletion
        header("Location: tempTable.php");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    echo "No tempID provided.";
    exit;
}

$conn->close();
?>
