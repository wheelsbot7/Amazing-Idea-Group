<?php  
    require "db_config.php";
    require "ProjectDatabase.php";

// Database query
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data if necessary
    $selectedSubject = $_POST['dropdown'];

    // Prepare and execute a query based on the selected project subject
    $sql = "SELECT * FROM projects WHERE projectSubject = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedSubject);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Project Name: " . $row['projectName'] . "</p>";
            echo "<p>Level: " . $row['projectLevel'] . "</p>";
            echo "<p>Description: " . $row['projectDesc'] . "</p>";
            echo "<p>Start Date: " . $row['startDate'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No results found for the selected project subject.";
    }

    $stmt->close();
}

$conn->close();
?>