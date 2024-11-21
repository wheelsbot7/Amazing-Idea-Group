<?php
include 'dbconnection.php';

$projects = []; // Initialize the projects array

// SQL Query to fetch all projects
$sql = "SELECT * FROM pending";

// Use a prepared statement for better security
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = [
            'tempID' => $row['tempID'],
            'userEmail' => $row['email'],
            'tempName' => $row['name'],
            'tempFields' => $row['subject'],
            'tempDesc' => $row['comment'],
            'submitDate' => $row['submitDate']
        ];
    }
} else {
    echo "<p>No projects found in the database.</p>";
}

$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Results.css">
    <title>Project List</title>
</head>
<body>

<h1>Temporary Project List</h1>
<div class="button-row">
        <button id="showFormButton">Show Form</button>
        <button>Other Button 1</button>
        <button>Other Button 2</button>
</div>

<br>
<?php
// Loop through projects and output each in HTML structure
if (!empty($projects)) {
    foreach ($projects as $project) {
        echo '<div class="project-card">';
            echo '<div class="project-title">' . htmlspecialchars($project['tempID']) . ': ' .  htmlspecialchars($project['tempName']) . '</div>';
            echo '<div class="project-content">';
                echo '<div class="contact-info">Email: ' . htmlspecialchars($project['userEmail']) . '</div>';
                echo '<div class="project-field">Project Field: ' . htmlspecialchars($project['tempFields']) . '</div>';  
                echo '<div class="project-desc">' . htmlspecialchars($project['tempDesc']) . '</div>';
            echo '</div>'; // Close project content section
        echo '</div>'; // Close card section
    }
} else {
    echo "<p>No projects found in the database.</p>";
}

$conn->close();
?>

</body>
</html>
