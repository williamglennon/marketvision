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
        <form id="regForm" action="php/password-reset.inc.php" method="post">
          <h1 align="center">Reset Your Password:</h1>
          <p>An e-mail will be sent to you with instuctions on how to reset your password.</p>
          <input class="contact" type="text" id="email" name="email" placeholder="Enter your Email..." required>
          <p style="font-size: 1px">  .</p>
          <input class="contact" type="submit" value="Send Link">
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "sqlerror") {
                echo '<p style="text-align: center; background-color: red; width: 90%; border-radius: 5px; color:white;">An error occured with our Databases. Please try again; <br> If the error continues please let us know via the Contact Us page.</p>';
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
