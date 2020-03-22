<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <?php
          echo '<h1 style="margin-top:5px;" size="10pt">Error <font size="5pt">- Cannot find data for "'.$_GET['symbol'].'"</font></h1>'
        ?>
        <br>
        <h3>Please double check spelling and try again.</h3>
        <h4 style="margin-left:10px; margin-top:5px;">If spelling is correct please be aware:</h4>
        <p style="margin-left:20px; margin-top:5px;">We are unable to support and collect data for all possible market points. This could include
        cases such as:</p>
        <ul style="margin-left:45px; margin-top:5px;">
          <li>Certain Indexes</li>
          <li>Stocks from small / foreign markets.</li>
          <li>Non-Pulbic or recent IPOs</li>
          <li>Cryptocurrencies</li>
        </ul>
        <p style="margin-left:20px; margin-top:5px;">We are sorry for any inconvience this may cause. To learn more about the support and limitations
        of our <br>insights and predictive algorithms and the reasoning behind them, please visit our
        <a href="about.php">About page</a> or feel free <br>to reach out with any further questions using our
        <a href="contact.php">Contact page</a>. Thank you for your understanding.</p>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
