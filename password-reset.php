<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <form style="margin-top:35px" id="regForm" action="./php/password-reset.inc.php" method="post">
          <h1 align="center">Reset Your Password:</h1>
          <p align="center" style="margin-top:5px;">An e-mail will be sent to you with instuctions on how to reset your password.</p>
          <input style="margin-top:15px; margin-left:6%;" class="contact" type="text" id="email" name="email" placeholder="Enter your Email..." required>
          <input style="margin-top:15px;" class="contact" type="submit" value="Send Link">
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "sqlerror") {
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">An error occured with our Databases. Please try again; <br> If the error continues please let us know via the Contact Us page.</p>';
              }
            }
            else if(isset($_GET['reset'])){
              if ($_GET['reset'] == "success") {
                echo '<p style="text-align: center; background-color: green; width: 90%; border-radius: 5px; color:white;">Reset link sent. Check your Email.</p>';
              }
            }
          ?>
        </form>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
