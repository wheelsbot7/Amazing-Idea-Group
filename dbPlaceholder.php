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

// Initialize an empty array to store project data
$projects = [];

// Query to select all projects
$sql = "SELECT * FROM projects";
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

// Display the projects array (for debugging purposes)
/*
echo "<pre>";
print_r($projects);
echo "</pre>";
echo $projects[index]['field_name']
*/

echo $projects[2]['projectName']

?>
<br><br>
<button onclick="window.location.href='projects.php';">Back</button>
