
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Elizabethtown College Project";

require_once "includes/header.php";
include 'dbconnection.php';

// Array to store project data
$fields = [];

// SQL query
$sql = "SELECT * FROM fields";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the result and store each row in the $fields array
    while ($row = $result->fetch_assoc()) {
        $fields[] = $row;
    }
} else {
    echo "<p>No projects found in the database.</p>";
}

// Close the connection
$conn->close();

?>
<link
    href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
    rel="stylesheet" />

<div class="w3-padding-16">
    <div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
        <span class="w3-xlarge">Projects</span>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<head>
<link rel="stylesheet" href="design.css">
<link rel="stylesheet" href="dropdown.css">


</head>
<body>

    <?php
    require_once "includes/footer.php"
    ?>
    <center>

        <form action="projectResults.php" method = "POST">
        <!-- <label for="Majors">Choose a Category: </label> -->
            <br>
            
            <select name="Majors" id="Majors" class="dropdown-menu">
                    <!-- Placeholder option -->
                <option value="" disabled selected class = "placeholder">Choose a Category</option>

                <!--  using PHP to loop through every fieldSubject in the fields table and report fieldID for filtering on next page-->
                <?php foreach ($fields as $field): ?>
                    <option value="<?= $field['fieldID']; ?>"><?= $field['fieldSubject']; ?></option>
                <?php endforeach; ?>

            </select>
            
            <br><br>
            <input type="submit" value="Submit">
        </form>

    </center>
    
</body>

</html>