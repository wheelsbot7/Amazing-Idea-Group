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

                            <!-- HTML BEGINS HERE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Results.css">
    <title>Project List</title>
</head>
<body>

<h1>Temporary Project List</h1>
<div class="button-row">
    <button onclick="window.location.href='newIdea.php'" id="NewIdea">New Idea</button>
    <center>
        <form action="" method="POST"> <!-- Changed to POST for better practice -->
            <!-- Options list for Ideas to edit -->
            <br>
            <select name="tempID" id="tempProjects" class="dropdown-menu">
                <!-- Placeholder option -->
                <option value="" disabled selected class="placeholder">Select Idea</option>

                <!-- Loop through list and provide options -->
                <?php foreach ($projects as $projects_edit): ?>
                    <option value="<?= htmlspecialchars($projects_edit['tempID']); ?>">
                        <?= htmlspecialchars($projects_edit['tempName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <button type="submit" name="action" value="edit">Edit</button>
            <button type="submit" name="action" value="delete">Delete</button>
            <button type="submit" name="action" value="push">Transfer to Public</button>
            
        </form>
    </center>

    <button onclick="window.location.href='logout.php'" id = "Logout">Logout</button>

    <?php
        //Logic for page redirection

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action']; // Determine which button was clicked
            $tempID = $_POST['tempID']; // Get the selected project ID

            if (empty($tempID)) {
                echo "Error: No project selected.";
                exit;
            }

            if ($action === 'edit') {
                // Redirect to the edit page
                header("Location: editIdea.php?tempID=" . htmlspecialchars($tempID));
                exit;
            } elseif ($action === 'delete') {
                // Redirect to the delete page
                header("Location: deleteIdea.php?tempID=" . htmlspecialchars($tempID));
                exit;
            } elseif ($action === 'push') {
                // Redirect to the delete page
                header("Location: move2public.php?tempID=" . htmlspecialchars($tempID));
                exit;
            } else {
                echo "Error: Invalid action.";
            }
        }
    ?>

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
