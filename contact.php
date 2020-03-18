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
        <form id="regForm" action="php/contact.inc.php" method="post">
          <h1 align="center">Contact Us:</h1>
          <label for="fname">First Name</label>
          <p style="font-size: 1px">  .</p>
          <input class="contact" type="text" id="fname" name="fname" placeholder="Your name.." required>
          <p style="font-size: 1px">  .</p>
          <label for="lname">Last Name</label>
          <p style="font-size: 1px">  .</p>
          <input class="contact" type="text" id="lname" name="lname" placeholder="Your last name.." required>
          <p style="font-size: 1px">  .</p>
          <label for="lname">E-Mail</label>
          <p style="font-size: 1px">  .</p>
          <input class="contact" type="text" id="email" name="email" placeholder="Your E-Mail.." required>
          <p style="font-size: 1px">  .</p>
          <label for="Subject">Subject</label>
          <p style="font-size: 1px">  .</p>
          <select id="subject" name="subject">
            <option value="member">Problem with Account</option>
            <option value="data">Question about our Data</option>
            <option value="site">Question about our Site</option>
            <option value="bug">Report a bug</option>
            <option value="other">Other</option>
          </select>
          <p style="font-size: 1px">  .</p>
          <label for="message">Message</label>
          <p style="font-size: 1px">  .</p>
          <textarea id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea>
          <p style="font-size: 1px">  .</p>
          <input class="contact" type="submit" value="Submit">
        </form>
        <p style="font-size: 1px">  .</p>
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
