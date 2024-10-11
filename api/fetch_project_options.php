<?php  
    require "db_config.php";
    require "ProjectDatabase.php";

// Database query
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch project subjects from the database
$sql = "SELECT DISTINCT projectSubject FROM projects"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<input type='radio' name='dropdown' value='" . $row['projectSubject'] . "' id='" . $row['projectSubject'] . "' class='radio'>";
        echo "<label for='" . $row['projectSubject'] . "'>";
        echo "<span>" . $row['projectSubject'] . "</span>";
        echo "</label>";
        echo "</div>";
    }
} else {
    echo "No options available";
}

$conn->close();
?>