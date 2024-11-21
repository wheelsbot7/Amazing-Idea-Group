<?php
include 'dbconnection.php';
require_once "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a major was selected and allow full page to run
    if (isset($_POST['Majors']) && !empty($_POST['Majors'])) {
        // Retrieve and display the selected major
        $selectedMajor = $_POST['Majors'];
        //echo "<h1>You have selected: $selectedMajor</h1>";
        $validSelection = true;

        // Empty array to store project data
        $projects = [];

        //  SQL QUERY GOES HERE
        $sql = "SELECT projectID, projectName, projectLevel, projectDesc, fieldSubject as 'projectField(s)' FROM projects p
        LEFT JOIN proj_field pf ON p.projectID = pf.ProjID
        LEFT JOIN fields f ON pf.fields_ID = f.fieldID
        WHERE fieldID = $selectedMajor
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through the result and store each row in the $projects array
            while ($row = $result->fetch_assoc()) {
                $projects[] = $row; // Add the entire row to the array
            }
        } else {
            echo "0 results";
        }
    } else {
        // Show an error message if no selection was made and exit code on page
        echo "<h1 style='color: red; text-align: center;'>Error: Please select a major.</h1>";
        $validSelection = false;
    }
}



// Close the connection
$conn->close();

?>

<br><br><br>
<button onclick="window.location.href='projects.php';">Back</button>

<!--  Begin implementing data to Website -->
<?php if ($validSelection): ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/Results.css">
        <title>Project List</title>

    </head>

    <body>

        <h1>Project List</h1>

        <?php
        //  Declare all variables with information about projects

        if ($result->num_rows > 0) {
            // Loop through the result set and populate the $projects array
            while ($project = $result->fetch_assoc()) {
                // Add each project to the $projects array, using dynamic indexes
                $projects[] = [
                    'projectID' => $project['projectID'],
                    'projectName' => $project['projectName'],
                    'projectLevel' => $project['projectLevel'],
                    'projectDesc' => $project['projectDesc'],
                    'projectField(s)' => $project['projectField(s)']
                ];
            }
        } else {
            echo "<p>No projects found in the database.</p>";
        }


        // Loop through projects and output each in HTML structure
        foreach ($projects as $project) {
            //  Start Cards
            echo '<div class="project-card">';

            echo '<div class="project-title">' . htmlspecialchars($project['projectName']) . '</div>';

            // Start the content section
            echo '<div class="project-content">';
            echo '<div class="project-field">' . htmlspecialchars($project['projectField(s)']) . '</div>';
            echo '<div class="project-level">Level: ' . htmlspecialchars($project['projectLevel']) . '</div>';
            echo '<div class="project-desc">' . htmlspecialchars($project['projectDesc']) . '</div>';
            echo '</div>';  // Close project content section

            echo '</div>'; // Close card section
        }
        ?>

    </body>

    </html>
<?php endif; ?>