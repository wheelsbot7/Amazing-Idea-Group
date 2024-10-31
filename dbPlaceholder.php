<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected value from the dropdown
    $selectedMajor = $_POST['Majors'];

    // Display the selected major
    echo "<h1>You have selected: $selectedMajor</h1>";
} else {
    // If the form wasn't submitted properly, show an error message
    echo "<h1>Error: No selection was made.</h1>";
}
?>
<button onclick="window.location.href='projects.php';">Back</button>