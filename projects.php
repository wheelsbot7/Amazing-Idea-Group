<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$title = "Elizabethtown College Project";

require_once "includes/header.php";

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--Dropdown menu with the project subjects-->
    <body>
    <form action = "api/projectdata.php" method = "POST">
    <div class = "center">
    <div class ="project-specs">
        <div class = "dropdown-container">

    <div class = "dropdown">
            <div class = "title" >Select a Project Subject</div>
            <div class="input-box" onclick = "toggleDropdown()">
            <span id = "selectedOption"> Select Subject </span>
</div>
            <div class="list" id = "dropdownOptions">
            <input type = "radio" name = "drop1" id = "id1" class = "radio">
            <label for ="id1">
                <span class = "all-subjects"> All Subjects </span>
            </label>
            <input type = "radio" name = "drop2" id = "id2" class = "radio">
            <label for ="id2">
                <span class = "biomed-eng">Biomedical Engineering</span>
            </label>
            <input type = "radio" name = "drop3" id = "id3" class = "radio">
            <label for ="id3">
                <span class = "civil-eng">Civil Engineering</span>
            </label>
            <input type = "radio" name = "drop4" id = "id4" class = "radio">
            <label for ="id4">
                <span class = "comp-eng">Computer Engineering</span>
            </label>
            <input type = "radio" name = "drop5" id = "id5" class = "radio">
            <label for ="id5">
                <span class = "comp-sci">Computer Science</span>
            </label>
            <input type = "radio" name = "drop6" id = "id6" class = "radio">
            <label for ="id6">
                <span class = "data-science">Data Science</span>
            </label>
            <input type = "radio" name = "drop7" id = "id7" class = "radio">
            <label for ="id7">
                <span class = "elec-eng">Electrical Engineering</span>
            </label>
            <input type = "radio" name = "drop8" id = "id8" class = "radio">
            <label for ="id8">
                <span class = "env-eng">Environmental Engineering</span>
            </label>
            <input type = "radio" name = "drop9" id = "id9" class = "radio">
            <label for ="id9">
                <span class = "indus-eng">Industrial and Systems Engineering</span>
            </label>
            <input type = "radio" name = "drop10" id = "id10" class = "radio">
            <label for ="id10">
                <span class = "info-systems">Information Systems</span>
            </label>
            <input type = "radio" name = "drop11" id = "id11" class = "radio">
            <label for ="id11">
                <span class = "mech-eng">Mechanical Engineering</span>
            </label>   


</div>
</div>  
</div> 
</div>




<input type="submit" value="Search" class = "submit-button">
    </form>

</div> 
         
 






<!-- JavaScript for dropdown menu animation
When clicked the menu will have an unfolding animation and when an option is clicked, the menu will fold back up.
It also implements the database to display the results when an option is clicked. -->
    <script>
        function toggleDropdown() {
        var list = document.getElementById("dropdownOptions");
        if (list.style.display === "none" || list.style.display === "") {
            list.style.display = "block";
        } else {
            list.style.display = "none";
        }
    }

    function selectOption(selected) {
        var selectedOption = document.getElementById('selectedOption');
        selectedOption.textContent = selected.value;
        toggleDropdown();
    }
        var input = document.querySelector(".input-box");
        input.onclick = function () {
        this.classList.toggle("open");
        let list = this.nextElementSibling;
        if (list.style.maxHeight) {
          list.style.maxHeight = null;
          list.style.boxShadow = null;
        } else {
          list.style.maxHeight = list.scrollHeight + "px";
          list.style.boxShadow =
            "0 1px 2px 0 rgba(0, 0, 0, 0.15),0 1px 3px 1px rgba(0, 0, 0, 0.1)";
        }
      };
      var label = document.querySelectorAll("label");
        function search(searchin) {
        let searchVal = searchin.value;
        searchVal = searchVal.toUpperCase();
        label.forEach((item) => {
          let checkVal = item.querySelector(".name").innerHTML;
          checkVal = checkVal.toUpperCase();
          if (checkVal.indexOf(searchVal) == -1) {
            item.style.display = "none";
          } else {
            item.style.display = "flex";
          }
          let list = input.nextElementSibling;
          list.style.maxHeight = list.scrollHeight + "px";
        });
        }

        var rad = document.querySelectorAll(".radio");
        rad.forEach((item) => {
        item.addEventListener("change", () => {
          input.innerHTML = item.nextElementSibling.innerHTML;
          selectOption(item);
        });
      });

        

      //Loads database results
      $(document).ready(function(){
            // Fetch data using AJAX from a separate backend PHP script when the page loads
            $.ajax({
                type: 'POST',
                url: 'api/fetch_project_options.php', // Separate PHP file to fetch data
                success: function(response) {
                    $('#dropdownOptions').html(response);
                }
            });

            // Handle form submission using AJAX to prevent page reload
            $('#searchForm').submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: 'POST',
                    url: 'api/projectdata.php', // Backend PHP file to handle form data
                    data: formData,
                    success: function(response) {
                        $('#searchResults').html(response); // Display search results
                    }
                });
            });
        });
    </script>
   
<?php
require_once "includes/footer.php"
?>

</body>
</html>
