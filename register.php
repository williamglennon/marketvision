<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <form style="margin-top:35px" id="regForm" action="./php/register.inc.php" method="post">
          <h1 align="center">Create an Account:</h1>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "invalidmailuser") {
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Both the Email & Username entered are invalid. <br> Please enter a valid Email. Please only use English Numbers & Letters in your username.</p>';
              }
              else if ($_GET['error'] == "invalidmail"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Please enter a valid Email.</p>';
              }
              else if ($_GET['error'] == "invaliduser"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Please only use English Numbers & Letters in your username.</p>';
              }
              else if ($_GET['error'] == "sqlerror"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">An error occured with our Databases. Please try again; <br> If the error continues please let us know via the Contact Us page.</p>';
              }
              else if ($_GET['error'] == "taken"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">The Username or Email entered is already in use, please try again.</p>';
              }
            }
            else if (isset($_GET['register'])){
              echo '<p style="text-align: center; background-color: green; width: 90%; border-radius: 5px; color:white;">Account Registration Complete.</p>';
            }
          ?>
          <div class="tab">
            <p style="margin-left:20%; margin-top:5px;">First Name: <input class="reg" placeholder="..." oninput="this.className = ''" name="firstname"></p>
            <p style="margin-left:20%; margin-top:5px;">Last Name: <input class="reg" placeholder="..." oninput="this.className = ''" name="lastname"></p>
          </div>
          <div class="tab">
            <p style="margin-left:20%; margin-top:5px;">E-Mail: <input style="margin-left:13px;" class="reg" placeholder="..." oninput="this.className = ''" name="email"></p>
            <p style="margin-left:20%; margin-top:5px;">Birthday: <input type="date" class="reg" placeholder="Phone..." oninput="this.className = ''" name="birthday"></p>
          </div>
          <div class="tab">
            <p style="margin-left:20%; margin-top:5px;"> Username: <input class="reg" placeholder="..." oninput="this.className = ''" name="username"></p>
            <p style="margin-left:20%; margin-top:5px;">Password: <input style="margin-left:3px;" type="password" class="reg" placeholder="..." oninput="this.className = ''" name="password"></p>
          </div>
          <div style="overflow:auto; margin-top:5px;">
            <div style="float:right;">
              <button style="padding: 10px 25px;" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button style="padding: 10px 25px; cursor: pointer;" type="button" name="register_but"id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        </form>
        <script>
          var currentTab = 0; // Current tab is set to be the first tab (0)
          showTab(currentTab); // Display the current tab
          function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
            }
            else {
              document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = "Submit";
            }
            else {
              document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
          }
          function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
              //...the form gets submitted:
              document.getElementById("regForm").submit();
              return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
          }
          function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
              // If a field is empty...
              if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
              }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
              document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
          }
          function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
              x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
          }
        </script>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
