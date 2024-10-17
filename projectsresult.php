<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Elizabethtown College Project";

require_once "includes/header.php";
/*
include('dbconnection.php');
if(isset($_POST['submit'])) {
    $name = $_POST['projectSubject'];
} */
?>
<link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
      rel="stylesheet"
    />
<link rel="stylesheet" href="css/dropdown.css">
<link rel="stylesheet" href="css/design.css">
<div class="w3-padding-16" >
<div class="w3-row w3-center w3-dark-grey w3-padding-48 w3-section">
    <span class="w3-xlarge">Projects</span>
  </div>
</div>

<h1>Project List</h1>

<?php
$url ="http://127.0.0.1/ECSProjects/src";
 //$web_string = file_get_contents($url."/data_src/api/products/read.php?APIKEY=$api_key&catID={$catID}&id={$id}");
 $web_string = file_get_contents($url."/data_src/api/projectdata.php");

 $projects = json_decode($web_string);

 foreach($projects as $project){
  echo $project->projectName;
  echo "<BR><BR><BR>";
 }
 
?>
<?php
require_once "includes/footer.php"
?>
