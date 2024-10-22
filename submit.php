<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Submit a Project";

require_once "includes/header.php";


?>
<link rel="stylesheet" href="css/design.css">
<div class="w3-padding-16" id="submit">
    <div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
        <span class="w3-row w3-center w3-dark-grey w3-padding-16 w3-xlarge">Every Project Starts with an Idea</span>
    </div>
    <div class="w3-row w3-center w3-large ">
        <p>Have a project you would like to have displayed?</p>
        <p>We would love to hear about it!</p>
        <p>
            <!-- User input boxes to submit a project idea, which when submitted, will send the form as an email-->
        <form action="contact_form.php" method="post">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Subject">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="Comment">
            <button class="w3-button w3-black w3-section" type="submit">
                SEND MESSAGE
            </button>
        </form>
    </div>
</div>

<?php
require_once "includes/footer.php"
?>