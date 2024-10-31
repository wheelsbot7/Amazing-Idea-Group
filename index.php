<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Elizabethtown College Project";

require_once "includes/header.php";
?>
<link rel="stylesheet" href="css/design.css">
<link rel="stylesheet" href="css/w3.css">
<!--Logo with background picture-->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img style="margin:auto; display:block" src="images/masters_center.jpg"
    alt="Elizabethtown College" width="1440" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>ECS Projects</b></span>

    </h1>
  </div>
</header>

<body>
  <!--Infographic bar-->
  <div class="w3-row w3-center w3-dark-grey w3-padding-16">
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">50+</span><br>Available Projects
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">75+</span><br>Completed Projects
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">30+</span><br>Faculty
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">250+</span><br>ECS Students
    </div>
  </div>


  <h3 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">PROJECTS IN ACTION</h2>
      <p class="w3-center w3-wide">↓ ↓ ↓ ↓</p>

      <div class="slideshow-container w3-center">

        <div class="mySlides fade">
          <img src="images/Fox-and-Stoner.png" style="width:90%">
        </div>
        <div class="mySlides fade">
          <img src="images/CS341_2023.jpeg" style="width:90%">
        </div>
        <div class="mySlides fade">
          <img src="images/Marston.png" style="width:90%">
        </div>
        <div class="mySlides fade">
          <img src="images/Botticelli-1.png" style="width:90%">
        </div>
        <div class="mySlides fade">
          <img src="images/Brightup-Klinefelter.png" style="width:90%">
        </div>
        <div style="text-align:center">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>


      </div>
      <br>



      <div class="w3-container w3-center" id="about">
        <h4 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ABOUT</span></h4>
        <p>We aim to fulfill every student and facility's ambitions of putting ideas into action.
        <p> Our goal is to
          hold ideas for any member of the community to join.
        <p>
          This website will not only spark motivation for students to create a project of their own,
        <p>but also display the hard work of students for the community to see.

      </div>
      <div class="w3-container" id="menu">
        <div class="w3-content" style="max-width:700px">

          <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">ELIZABETHTOWN COLLEGE ENGINEERING AND COMPUTER SCIENCE DEPARTMENTS</span></h5>

          <div class="w3-row w3-center w3-card w3-padding">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Eng');" id="myLink">
              <div class="w3-col s6 tablink">Engineering</div>
            </a>
            <a href="javascript:void(0)" onclick="openMenu(event, 'CS');">
              <div class="w3-col s6 tablink">Computer Science</div>
            </a>
          </div>

          <div id="Eng" class="w3-container menu w3-padding-48 w3-card w3-center">
            <h5><a href="https://www.etown.edu/schools/school-of-engineering-and-computer-science/engineering/index.aspx" target="_blank">Engineering</h5></a>
            <p class="w3-text-grey">Elizabethtown College’s Engineering program is designed to prepare students for a technical career in the workforce or for graduate school. We strongly believe in producing well-rounded generalist engineers who understand the mechanical and electrical systems of a design and how those systems interact with the environment and with industry.</p>
            <p> Featuring: Biomedical Engineering, Civil Engineering, Computer Engineering, Electrical Engineering, Enviornmental Engineering, Industrial and Systems Engineering, Mechanical Engineering</p>
          </div>
          <div id="CS" class="w3-container menu w3-padding-48 w3-card w3-center">
            <h5><a href="https://www.etown.edu/schools/school-of-engineering-and-computer-science/computer-science/index.aspx" target="_blank">Computer Science</h5></a>
            <p class="w3-text-grey">The Department of Computer Science at Elizabethtown College is all about hands-on experiences. We don’t believe that students should sit in a room and hear lectures. We believe that students should be able to get involved with hands-on projects early on. From projects including robotics, coding, and databases.</p>
            <p>Featuring: Computer Science, Data Science, Information Systems
              </br>

          </div>
          <div class="w3-padding-48 w3-center">
            <a href="projects.php" class="w3-padding-16 w3-center w3-bar-item w3-tag w3-button">Check Out Available Projects</a>
          </div>
</body>


</div>



</div>

<?php
require_once "includes/footer.php"

?>


<script>
  //JavaScript for the Engineering and Computer Science information
  function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
  }
  document.getElementById("myLink").click();

  //JavaScript for the automatic photo slideshow
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
</script>