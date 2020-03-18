<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <p style="font-size: 1px">  .</p>
        <form id="regForm" action="php/forgotten-password.inc.php" method="post">
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
              else if ($_GET['reset'] == "success"){
                echo '<p style="text-align: center; background-color: green; width: 90%; border-radius: 5px; color:white;">Password successfully reset.</p>';
              }
              else{
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){ //checks to make sure its valid hex
            ?>
                <input class="contact" type="password" id="password" name="password" placeholder="Enter new password..." required>
                <p style="font-size: 1px">  .</p>
                <input class="contact" type="password" id="password2" name="password2" placeholder="Confirm password..." required>
                <p style="font-size: 1px">  .</p>
                <input class="contact" type="submit" value="Change password">
              </form>
              <?php
            }
          }
        ?>
      </div>
    </div>
    <div class="backingMetaFooter">
      <div class="contentAreaMetaFooter">
        <div class="row">
          <div class="columnMetaFooter">
            <p>Meta</p>
            <div class="metaFooterText">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sitemap.php">Sitemap</a></li>
              </ul>
            </div>
          </div>
          <div class="columnMetaFooter">
            <p>About</p>
            <div class="metaFooterText">
              <ul>
                <li><a href="about.php">About Site</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="columnMetaFooter">
            <p>Support</p>
            <div class="metaFooterText">
              <ul>
                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                <li><a href="terms-use.php">Terms of Use</a></li>
                <li><a href="disclaimer.php">Disclaimer</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="backingFooter">
      <div class="contentAreaFooter">
        <p align="center">Copyright © 2020 Market Vision – Created By: <a href="https://www.jamesdenbow.com" target="_blank">James Denbow</a> & <a href="https://www.linkedin.com/in/william-glennon-05237213b/" target="_blank">William Glennon</a></p>
      </div>
    </div>
  </body>
</html>
