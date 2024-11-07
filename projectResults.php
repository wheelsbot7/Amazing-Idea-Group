<?php
include 'dbconnection.php';
//require_once "includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected value from the dropdown
    $selectedMajor = $_POST['Majors'];

    // Display the selected major
    echo "<h1>You have selected: $selectedMajor</h1>";  
} else {
    // If the form wasn't submitted properly, show an error message
    echo "<h1>Error: No selection was made.</h1>";
}

// Empty array to store project data
$projects = [];

                                                        //SQL QUERY GOES HERE
$sql = "SELECT projectID, projectName, projectLevel, projectDesc, fieldSubject as 'projectField(s)' FROM projects p
LEFT JOIN proj_field pf ON p.projectID = pf.ProjID
LEFT JOIN fields f ON pf.fields_ID = f.fieldID
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the result and store each row in the $projects array
    while($row = $result->fetch_assoc()) {
        $projects[] = $row; // Add the entire row to the array
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();

// Display projects array
/*
echo "<pre>";
print_r($projects);
echo "</pre>";
echo $projects[index]['field_name']
*/

?>

<br><br>

<!--  Begin implementing data to Website -->

<button onclick="window.location.href='projects.php';">Back</button>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <style>
        /* Basic styling for the project cards */
        .project-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            background-color:#1E90FF;
            margin: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .project-title {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 8px;
        }
        .project-field {
            text-indent: 40px;
            font-weight: bold;
            color: #555;
        }
        .project-level {
            text-indent: 40px;
            margin-top: 12px;
            color: #666;
        }
        .project-desc {
            text-indent: 40px;
            margin-top: 12px;
            color: #666;
        }
        
    </style>
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
            'projectField(s)'=> $project['projectField(s)']
        ];
    }
} else {
    echo "<p>No projects found in the database.</p>";
}
/*
$projects = [
    ['projectID' => 1,
        'projectName' => $projects[0]['projectName'],
        'projectLevel' => $projects[0]['projectLevel'],
        'projectDesc' => $projects[0]['projectDesc'],
        'projectField(s)'=> $project['projectField(s)']
    ],
];
*/

// Loop through projects and output each in HTML structure
foreach ($projects as $project) {
    echo '<div class="project-card">';
    echo '<div class="project-title">' . htmlspecialchars($project['projectName']) . '</div>';
    echo '<div class="project-field">' . htmlspecialchars($project['projectField(s)']) . '</div>';
    echo '<div class="project-level">Level: ' . htmlspecialchars($project['projectLevel']) . '</div>';
    echo '<div class="project-desc">' . htmlspecialchars($project['projectDesc']) . '</div>';
    
    echo '</div>';
}
?>

</body>
</html>

