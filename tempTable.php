<?php
include 'dbconnection.php';

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

$conn->close();
?>