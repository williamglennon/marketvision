<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <form style="margin-top:35px" id="regForm" action="php/contact.inc.php" method="post">
          <h1 align="center">Contact Us:</h1>
          <label style="margin-left:12%;" for="fname">First Name</label>
          <p style="font-size: 1px">  .</p>
          <input style="margin-left:12%;" class="contact" type="text" id="fname" name="fname" placeholder="Your name.." required>
          <p style="font-size: 1px">  .</p>
          <label style="margin-left:12%;" for="lname">Last Name</label>
          <p style="font-size: 1px">  .</p>
          <input style="margin-left:12%;" class="contact" type="text" id="lname" name="lname" placeholder="Your last name.." required>
          <p style="font-size: 1px">  .</p>
          <label style="margin-left:12%;" for="lname">E-Mail</label>
          <p style="font-size: 1px">  .</p>
          <input style="margin-left:12%;" class="contact" type="text" id="email" name="email" placeholder="Your E-Mail.." required>
          <p style="font-size: 1px">  .</p>
          <label style="margin-left:12%;" for="Subject">Subject</label>
          <p style="font-size: 1px">  .</p>
          <select style="margin-left:12%;" id="subject" name="subject">
            <option value="member">Problem with Account</option>
            <option value="data">Question about our Data</option>
            <option value="site">Question about our Site</option>
            <option value="bug">Report a bug</option>
            <option value="other">Other</option>
          </select>
          <p style="font-size: 1px">  .</p>
          <label style="margin-left:12%;" for="message">Message</label>
          <p style="font-size: 1px">  .</p>
          <textarea style="margin-left:12%; height:200px;" id="message" name="message" placeholder="Write something.." required></textarea>
          <p style="font-size: 1px">  .</p>
          <input style="margin-left:45%;" class="contact" type="submit" value="Submit">
        </form>
        <p style="font-size: 1px">  .</p>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
