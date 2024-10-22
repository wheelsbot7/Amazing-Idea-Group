<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "About";

require_once "/includes/header.php";
?>
<div class="w3-container w3-padding-32" id="home.php#about">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
            <p>We aim to fulfill every student and facility's ambitions of putting ideas into action. Our goal is to
                hold ideas for any member of the community to join.
            </p>
        </div>
        <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://www.etown.edu/schools/school-of-engineering-math-and-computer-science/images/sara-atwood-headshot.jpg" alt="Atwood" style="width: 75%">
      <h3>Dr. Sara Atwood</h3>
      <p class="w3-opacity">Dean of the School of Engineering and Computer Science Professor of Engineering & Physics</p>
      <p>Sara Atwood received a B.A. and M.S. in Engineering Sciences from Dartmouth College and a Ph.D. in Mechanical Engineering from the University of California at Berkeley</p>
      <p><button class="w3-button w3-light-grey w3-block"><a href = "mailto:atwoods@etown.edu">Contact</button></a></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://www.etown.edu/depts/computer-science/images/Reddig%20headshot.jpeg" alt="Reddig" style="width:75%">
      <h3>Nancy Reddig</h3>
      <p class="w3-opacity">Computer Science Lecturer</p>
      <p>Nancy Reddig received a M.S., Computer Science from Penn State and B.A., Mathematics from Bryan College. She is a Software Developer.</p>
      <p><button class="w3-button w3-light-grey w3-block"><a href = "mailto:reddign@etown.edu">Contact</button></a></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://www.etown.edu/depts/math/images/faculty-images/Stephanie-Zegers.jpg" alt="Zegers" style="width:75%">
      <h3>Stephanie Zegers</h3>
      <p class="w3-opacity">Assistant Director for The School of ECS/STEM Relationship Development</p>
      <p>Stephanie Zegers is the Assistant Director of Engineering/STEM Relationship Development. Her role is to be the industry liaison for the School of Engineering and Computer Science.</p>
      <p><button class="w3-button w3-light-grey w3-block"><a href = "mailto:zegerss@etown.edu">Contact</button></a></p>
    </div>

    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="/w3images/team4.jpg" alt="Dan" style="width:100%">
      <h3>Dan Star</h3>
      <p class="w3-opacity">Architect</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
  </div>


<?php
require_once "/includes/footer.php"
?>