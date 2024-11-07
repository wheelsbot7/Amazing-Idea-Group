<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Elizabethtown College Project";

require_once "includes/header.php";

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
        
        <form action="projectResults.php" method="POST">
            <!-- <label for="Majors">Choose a Category: </label> -->
            <br>
            <select name="Majors" id="Majors" class="dropdown-menu">
                    <!-- Placeholder option -->
                <option value="" disabled selected class = "placeholder">Choose a Category</option>
                    <!-- Engineering-->
                <option value="MechE">Mechanical Engineering</option>
                <option value="EE">Electrical Engineering</option>
                <option value="EvE">Environmental Engineering</option>
                <option value="BioE">Biomedical Engineering</option>
                <option value="CE">Civil Engineering</option>
                <option value="CompE">Computer Engineering</option>
                <option value="IndE">Industrial Engineering</option>
                <option value="Mechatronics">Mechatronics Engineering</option>
                    <!-- Computer Science-->
                <option value="CompSci">Computer Science</option>
                <option value="Robot">Robotics</option>
                <option value="DBS">Database Systems</option>
                <option value="Networking">Networking</option>
                <option value="WebDev">Website Development</option>

            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </center>

</body>

</html>