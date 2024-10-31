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
<<<<<<< HEAD
    <link rel="stylesheet" href="css/dropdown.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/w3.css">
    <meta charset="utf-8">
    =======
    >>>>>>> d41d60a ( recreating page starting with dropdown menu for majors)
    <div class="w3-padding-16">
        <div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
            <span class="w3-xlarge">Projects</span>
        </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="design.css">

    <body>

        <<<<<<< HEAD
            <?php
            require_once "includes/footer.php"
            ?>=======<?php
            require_once "includes/footer.php"
            ?>
            <center>
            <link rel="stylesheet" href="dropdown.css">
            <form action="{Page for Submit button to send to}.php">
                <label for="Majors">Choose a Category </label>
                <br>
                <select name="Majors" id="Majors">
                    <!-- Engineering-->
                    <option value="MechE">Mechanical Engineering</option>
                    <option value="EE">Electrical Engineering</option>
                    <option value="EvE">Environmental Engineering</option>
                    <option value="BioE">Biomedical Engineering</option>
                    <option value="CE">Civil Engineering</option>
                    <option value="CompE">Computer Engineering</option>
                    <option value="IE">Industrial Engineering</option>
                    <option value="Mechatronics">Mechatronics Engineering</option>
                    <!-- Computer Science-->
                    <option value="CompSci">Computer Science</option>


                </select>
                <br><br>
                <input type="submit" value="Submit">
            </form>
            </center>
            >>>>>>> d41d60a ( recreating page starting with dropdown menu for majors)

    </body>

    </html>