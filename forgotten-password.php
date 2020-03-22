<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
      $selector = "";
      $validator = "";
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <form style="margin-top:35px" id="regForm" action="./php/forgotten-password.inc.php" method="post">
          <h1 align="center">Enter a New Password:</h1>
          <input type="hidden" name="selector" value="<?php echo $selector; ?>">
          <input type="hidden" name="validator" value="<?php echo $validator; ?>">
          <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if(empty($selector) || empty($validator)){
              echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Could not validate your request.</p>';
            }
            else if (isset($_GET['error'])) {
              if ($_GET['error'] == "emptyfield") {
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Please fill in all fields.</p>';
              }
              else if ($_GET['error'] == "pwdnomatch"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">The passwords entered do not match. Try again.</p>';
              }
              else if ($_GET['error'] == "invalid"){
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">An error occured. Please try again; <br> If the error continues please let us know via the Contact Us page.</p>';
              }
            }
            else if (isset($_GET['reset'])){
              if ($_GET['reset'] == "success"){
                echo '<p style="text-align: center; background-color: green; width: 90%; border-radius: 5px; color:white;">Password successfully reset.</p>';
              }
              else{
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){ //checks to make sure its valid hex
            ?>
                <input style="margin-top:5px" class="contact" type="password" id="password" name="password" placeholder="Enter new password..." required>
                <input style="margin-top:5px" class="contact" type="password" id="password2" name="password2" placeholder="Confirm password..." required>
                <p style="font-size: 1px">  .</p>
                <input class="contact" type="submit" value="Change password">
              </form>
              <?php
                }
                else{
                  echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">Could not validate your request.</p>';
                }
              }
            }
        ?>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
