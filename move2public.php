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

        // Insert the entry into the 'Projects' table
        $insertSQL = "INSERT INTO Projects (projectName, projectDesc) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSQL);
        $insertStmt->bind_param("ss", $row['projectName'], $row['projectDesc']);

        if ($insertStmt->execute()) {
            // Determine projID and catID based on 'subject'
            if ($row['subject'] === 'Computer Science') {
                $projID = 4;
                $catID = 1; // Example category ID for Computer Science
            } elseif ($row['subject'] === 'Computer Engineering') {
                $projID = 3;
                $catID = 2; // Example category ID for Computer Engineering
            } else {
                $projID = 1;
                $catID = 3; // Default category ID
            }

            // Verify catID exists in the categories table
            $checkSQL = "SELECT catID FROM categories WHERE catID = ?";
            $checkStmt = $conn->prepare($checkSQL);
            $checkStmt->bind_param("i", $catID);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows === 0) {
                die("Error: cat_ID $catID does not exist in the categories table.");
            }

            // Insert into 'proj_cat' table
            $insertSQL1 = "INSERT INTO proj_cat (projID, cat_ID) VALUES (?, ?)";
            $insertStmt1 = $conn->prepare($insertSQL1);
            if (!$insertStmt1) {
                die("Prepare failed: " . $conn->error);
            }

            $insertStmt1->bind_param("ii", $projID, $catID);

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
