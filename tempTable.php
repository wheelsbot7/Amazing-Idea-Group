<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a major was selected and allow full page to run
    if (isset($_POST['Majors']) && !empty($_POST['Majors'])) {
        // Retrieve and display the selected major
        $selectedMajor = $_POST['Majors'];
        echo "<h1>You have selected: $selectedMajor</h1>";
        $validSelection = true;

        // Empty array to store project data
        $projects = [];

        //  SQL QUERY GOES HERE
        $sql = "
        SELECT * FROM pending
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

    } else {
        // Show an error message if no selection was made and exit code on page
        //will get removed later
        echo "<h1 style='color: red; text-align: center;'>Error: Please select a major.</h1>";
        $validSelection = false;
        
    }
}


//  Declare all variables with information about projects

if ($result->num_rows > 0) {
    // Loop through the result set and populate the $projects array
    while ($project = $result->fetch_assoc()) {
        // Add each project to the $projects array, using dynamic indexes
        $projects[] = [
            'tempID' => $project['tempID'],
            'userEmail' => $project['email'],
            'tempName' => $project['name'],
            'tempField(s)' => $project['subject'],
            'tempDesc' => $project['comment'],
            'submitDate'=> $project['submitDate']
        ];
    }
} else {
    echo "<p>No projects found in the database.</p>";
}


// Loop through projects and output each in HTML structure
foreach ($projects as $project) {
    //  Start Cards
    echo '<div class="project-card">';
    
        echo '<div class="project-title">' . htmlspecialchars($project['tempName']) . '</div>';

        // Start the content section
        echo '<div class="project-content">';
            echo '<div class="project-field">' . htmlspecialchars($project['tempField(s)']) . '</div>';
            echo '<div class="contact-info">Email: ' . htmlspecialchars($project['userEmail']) . '</div>';
            echo '<div class="project-desc">' . htmlspecialchars($project['tempDesc']) . '</div>';
        echo '</div>';  // Close project content section
    
    echo '</div>'; // Close card section
}

$conn->close();
?>