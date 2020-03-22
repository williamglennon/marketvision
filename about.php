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
        <h1 style="margin-top:5px;">About Market Vision</h1>
        <br>
        <h2>Who created Market Vision?</h2>
        <p style="margin-left:10px; margin-top:5px;">Market Vision was created by two recent college graduates. We are both software developers with a passion for Machine Learning, A/I and Full-Stack Development. <br>
           In addition to our technical passions we both have a large interest in investment and stocks. </p>
        <p style="margin-left:10px; margin-top:3px;">You can learn more about each of us on our personal portfolios: <a href="https://www.jamesdenbow.com" target="_blank">James Denbow</a> & <a href="https://www.linkedin.com/in/william-glennon-05237213b/" target="_blank">William Glennon</a></p>
        <br>
        <h2>How was the Market Vision website made?</h2>
        <p style="margin-left:10px; margin-top:5px;">This site was made using a variety of programming languages to highlight different advantages of each language. The front-end of the site was custom built using <br>
           mainly HTML and CSS. A small amount of PHP was used in special handling such as on the contact form and the search bar. On the back-end we used SQL to <br>
           create all our databases. A lot of our calculations and predictions are done using Python using a number of different libraries such as Pandas.</p>
        <p style="margin-left:10px; margin-top:5px;">The site is stored on github in order to allow for easier collaboration between both developers. The site was then uploaded to shared sever hosting service via<br>
           FileZilla, a File Transfer Protocol handling application.</p>
        <br>
        <h2>Where do we get our data?</h2>
        <p style="margin-left:10px; margin-top:5px;">We use a variety of libraries and APIs to collect our real time market data, historical data and company information.</p>
        <ul style="margin-left:35px; margin-top:5px;">
          <li><b>Yahoo Finance API</b> - We utilize this API in order to get real time data on the Market Indexes, Biggest Movers & Highest Volume displayed on the Home page.</li>
          <li><b>yFinance</b> - This python library is the main datasource for our predictive algorithm and information displayed on our single stock insite page.</li>
          <li><b>Alpha Avantage API</b> - We utilize the built in functions to power our market indicator search bar.</li>
          <li><b>Finnhub API</b> - This API is the backend power of our Top Trades functions and predictions.</li>
        </ul>
        <p style="margin-left:10px; margin-top:5px;">Other data points, such as Stocks-In-Play, are gathered using a variety of webscrappers.</p>
        <br>
        <h2>How do we do our predictions & analysis?</h2>
        <p style="margin-left:10px; margin-top:5px;">test test test</p>
        <br>
        <h3>Have more questions? <a href="contact.php">Contact Us</a>.</h3>
        </div>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
