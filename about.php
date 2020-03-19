<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <div class="about">
        <p style="font-size: 1px">  .</p>
        <h1>About Market Vision</h1>
        <h2>Who created Market Vision?</h2>
        <p>Market Vision was created by two recent college graduates. We are both software developers with a passion for Machine Learning, A/I and Full-Stack Development. <br>
           In addition to our technical passions we both have a large interest in investment and stocks. </p>
        <p>You can learn more about each of us on our personal portfolios: <a href="https://www.jamesdenbow.com" target="_blank">James Denbow</a> & <a href="https://www.linkedin.com/in/william-glennon-05237213b/" target="_blank">William Glennon</a></p>
        <h2>How was the Market Vision website made?</h2>
        <p>This site was made using a variety of programming languages to highlight different advantages of each language. The front-end of the site was custom built using <br>
           mainly HTML and CSS. A small amount of PHP was used in special handling such as on the contact form and the search bar. On the back-end we used SQL to <br>
           create all our databases. A lot of our calculations and predictions are done using Python using a number of different libraries such as Pandas.</p>
        <p>The site is stored on github in order to allow for easier collaboration between both developers. The site was then uploaded to shared sever hosting service via<br>
           FileZilla, a File Transfer Protocol handling application.</p>
        <h2>Where do we get our data?</h2>
        <p>We use a variety of libraries and APIs to collect our real time market data, historical data and company information.</p>
        <ul>
          <li><b>Yahoo Finance API</b> - We utilize this API in order to get real time data on the Market Indexes, Biggest Movers & Highest Volume displayed on the Home page.</li>
          <li><b>yFinance</b> - This python library is the main datasource for our predictive algorithm and information displayed on our single stock insite page.</li>
          <li><b>Alpha Avantage API</b> - We utilize the built in functions to power our market indicator search bar.</li>
          <li><b>Finnhub API</b> - This API is the backend power of our Top Trades functions and predictions.</li>
        </ul>
        <p>Other data points, such as Stocks-In-Play, are gathered using a variety of webscrappers.</p>
        <h2>How do we do our predictions & analysis?</h2>
        <p>test test test</p>
        <h3>Have more questions? <a href="contact.php">Contact Us</a>.</h3>
        <p style="font-size: 1px">  .</p>
        </div>
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
