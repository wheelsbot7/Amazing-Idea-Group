<?php
// Database connection
include "dbconnection.php";

// Check if tempID is passed via GET
if (isset($_GET['tempID'])) {
    $tempID = $_GET['tempID'];

    // Fetch the entry from the original table
    $fetchSQL = "SELECT * FROM pending WHERE tempID = ?";
    $fetchStmt = $conn->prepare($fetchSQL);
    $fetchStmt->bind_param("i", $tempID);
    $fetchStmt->execute();
    $result = $fetchStmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert the entry into the 'projects' table
        $insertSQL = "INSERT INTO Projects (projectName, projectDesc) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSQL);
        $insertStmt->bind_param(
            "ss", 
            $row['projectName'], 
            $row['projectDesc']
        );

        // Insert the entry into the 'projects' table
        if ($insertStmt->execute()) {

            // Insert the project field into the 'proj_field' table
            $insertSQL1 = "INSERT INTO proj_cat (subject) VALUES (?)";
            $insertStmt1 = $conn->prepare($insertSQL1);
            $insertStmt1->bind_param(
                "s", 
                $row['subject'] // Ensure the correct field 'subject' is used for the proj_cat table
            );

            // Execute the insert statement for proj_field table
            if ($insertStmt1->execute()) {
                // Delete the entry from the original 'pending' table
                $deleteSQL = "DELETE FROM pending WHERE tempID = ?";
                $deleteStmt = $conn->prepare($deleteSQL);
                $deleteStmt->bind_param("i", $tempID);

                if ($deleteStmt->execute()) {
                    // Redirect to a success page
                    header("Location: tempTable.php");
                    exit;
                } else {
                    echo "Error deleting record: " . $deleteStmt->error;
                }
            } else {
                echo "Error inserting into proj_cat: " . $insertStmt1->error;
            }
        } else {
            echo "Error inserting into Projects: " . $insertStmt->error;
        }
    } else {
        echo "No record found for tempID: " . htmlspecialchars($tempID);
    }
} else {
    echo "No tempID provided.";
}

$conn->close();
?>
