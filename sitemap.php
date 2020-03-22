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
        <h1>Sitemap</h1>
        <br>
        <h3>Meta / Account Info</h3>
        <ul style="margin-left:25px;">
          <li><a href="register.php" style="display: block">Register Account</a></li>
          <li><a href="bookmarks.php" style="display: block">Bookmarks</a></li>
          <li><a href="sitemap.php" style="display: block">Sitemap</a></li>
          <li><a href="insight.php" style="display: block">Insights Page</a></li>
          <li><a href="insight-error.php" style="display: block">Insight Error Page</a></li>
        </ul>
        <br>
        <h3>About</h3>
        <ul style="margin-left:25px;">
          <li><a href="index.php" style="display: block">Home</a></li>
          <li><a href="top-trades.php" style="display: block">Top Trades</a></li>
          <li><a href="about.php" style="display: block">About Site</a></li>
          <li><a href="contact.php" style="display: block">Contact Us</a></li>
        </ul>
        <br>
        <h3>Support</h3>
        <ul style="margin-left:25px;">
          <li><a href="disclaimer.php" style="display: block">Disclaimer</a></li>
          <li><a href="privacy-policy.php" style="display: block">Privacy Policy</a></li>
          <li><a href="terms-use.php" style="display: block">Terms of Use</a></li>
        </ul>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
