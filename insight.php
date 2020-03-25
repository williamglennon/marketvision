<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <div class="insight-head">
          <script>
          $.getJSON( "./python/datacf3.json" )
            .done(function( json ) {
              var companysum = json.summary;
              var companyweb = json.website;
              document.getElementById("companyname").innerHTML = json.company_name;
              document.getElementById("companysummary").innerHTML = companysum + ' (<a href="' + companyweb + '" target="_blank">' + companyweb + '</a>)';
              document.getElementById("currentprice").innerHTML = json.close_data.slice(-1)[0];
              var pricediff = json.close_data.slice(-1)[0] - json.close_data.slice(-2)[0];
              var pricediffper = (pricediff /json.close_data.slice(-1)[0]) * 100
              if(pricediff >= 0){
                document.getElementById("currentpricediffup").innerHTML = ' ▲ +'+ pricediff.toFixed(2)+ ' ('+ pricediffper.toFixed(2) +'%)';
              }
              else {
                document.getElementById("currentpricediffdown").innerHTML = ' ▼ '+pricediff.toFixed(2)+ ' ('+ pricediffper.toFixed(2) +'%)';
              }
              document.getElementById("industry").innerHTML = json.industry;
              document.getElementById("sector").innerHTML = json.sector;
              document.getElementById("previousclose").innerHTML = json.previousClose;
              var pricediffclose = json.close_data.slice(-1)[0] - json.previousClose;
              var pricediffcloseper = (pricediffclose / json.close_data.slice(-1)[0]) * 100
              if(pricediffclose >= 0){
                document.getElementById("currentpricediffcloseup").innerHTML = ' ▲ +'+ pricediffclose.toFixed(2)+ ' ('+ pricediffcloseper.toFixed(2) +'%)';
              }
              else {
                document.getElementById("currentpricediffclosedown").innerHTML = ' ▼ '+pricediffclose.toFixed(2)+ ' ('+ pricediffcloseper.toFixed(2) +'%)';
              }
              document.getElementById("open").innerHTML = json.openPrice;
              var pricediffopen = json.close_data.slice(-1)[0] - json.openPrice;
              var pricediffopenper = (pricediffopen / json.close_data.slice(-1)[0]) * 100
              if(pricediffopen >= 0){
                document.getElementById("currentpricediffopenup").innerHTML = ' ▲ +'+ pricediffopen.toFixed(2)+ ' ('+ pricediffopenper.toFixed(2) +'%)';
              }
              else {
                document.getElementById("currentpricediffopendown").innerHTML = ' ▼ '+pricediffopen.toFixed(2)+ ' ('+ pricediffopenper.toFixed(2) +'%)';
              }
              document.getElementById("weekhigh").innerHTML = json.fiftyTwoWeekHigh;
              document.getElementById("weeklow").innerHTML = json.fiftyTwoWeekLow;
              document.getElementById("volume").innerHTML = json.regularMarketVolume;
              document.getElementById("marketcap").innerHTML = json.marketCap;
            })
            .fail(function( jqxhr, textStatus, error ) {
              var err = textStatus + ", " + error;
              document.getElementById("companysummary").innerHTML = "Request Failed: " + err;
              document.getElementById("companyname").innerHTML = "Request Failed: " + err;
              document.getElementById("currentprice").innerHTML = "Request Failed: " + err;
              document.getElementById("currentpricediffup").innerHTML = "Request Failed: " + err;
              document.getElementById("currentpricediffdown").innerHTML = "Request Failed: " + err;
              document.getElementById("industry").innerHTML = "Request Failed: " + err;
              document.getElementById("sector").innerHTML = "Request Failed: " + err;
              document.getElementById("previousclose").innerHTML = "Request Failed: " + err;
              document.getElementById("open").innerHTML = "Request Failed: " + err;
              document.getElementById("weekhigh").innerHTML = "Request Failed: " + err;
              document.getElementById("weeklow").innerHTML = "Request Failed: " + err;
              document.getElementById("volume").innerHTML = "Request Failed: " + err;
              document.getElementById("marketcap").innerHTML = "Request Failed: " + err;
          });
          </script>
          <?php
            echo '<h1 style="display: inline">'.$_GET['symbol'].' - </h1><h1 style="display: inline;" id="companyname"></h1>';

            if(isset($_SESSION['userId'])){
              require 'php/database-connection.inc.php';
              $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id WHERE bookmarksusers.user_id=? AND bookmarks.symbol=?;";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "<p style='display: inline; float: right; margin-right: 20px;'> Bookmark Error.</p>";
              }
              else{
                mysqli_stmt_bind_param($stmt, "ss", $_SESSION['userId'], $_GET['symbol']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                  $stringhold1 = "'images/bookmark-hover.png'";
                  $stringhold2 = "'images/bookmark-fill.png'";
                  echo'<a style="display: inline; float: right; margin-right: 20px;" href="php\bookmark.inc.php?symbol='.$_GET['symbol'].'&user='.$_SESSION['userId'].'&marked=true"><img src="images\bookmark-fill.png" onmouseover="this.src='.$stringhold1.'" onmouseout="this.src='.$stringhold2.'" width="30"height="30"></a>';
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
                else{
                  $stringhold1 = "'images/bookmark-fill-hover.png'";
                  $stringhold2 = "'images/bookmark.png'";
                  echo'<a style="display: inline; float: right; margin-right: 20px;" href="php\bookmark.inc.php?symbol='.$_GET['symbol'].'&user='.$_SESSION['userId'].'&marked=false"><img src="images\bookmark.png" onmouseover="this.src='.$stringhold1.'" onmouseout="this.src='.$stringhold2.'" width="30"height="30"></a>';
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
              }
            }
            else{
              echo '<style>
              .loginlink{
                border: 5px solid grey;
                border-radius: 8px;
                background-color: grey;
                color: white;
                display: inline;
                float: right;
                margin-right: 20px;
                margin-top: 5px;
              }
              .loginlink:hover{
                border: 5px solid black;
                border-radius: 8px;
                background-color: black;
                color: white;
                cursor: pointer;
                display: inline;
                float: right;
                margin-right: 20px;
                margin-top: 5px;
              }
              </style>
              <a class="loginlink" align="center" onclick="openForm()">Login</a>';
            }
           ?>
        </div>
        <br>
        <div style="border-bottom: 1.5px solid black;" class="row">
          <div class="insight-maingraph">
            <img src="/images/loading.gif" style="margin-bottom:20px;" width="730" height="400">
          </div>
          <div style="display: inline; float: right;" class="insight-maingraph">
            <br><br><br>
            <h2>Current Price: <p style="display: inline;" id="currentprice"></p>  <p style="display: inline; color:green;" id="currentpricediffup"></p><p style="display: inline; color:red;" id="currentpricediffdown"></p></h2>
            <br>
            <h2><p style="display: inline;" id="industry"></p> - <p style="display: inline;" id="sector"></p></h2>
            <br>
            <h3>Previous Close: <p style="display: inline;" id="previousclose"></p><p style="display: inline; color:green;" id="currentpricediffcloseup"></p><p style="display: inline; color:red;" id="currentpricediffclosedown"></p></h3>
            <br>
            <h3>Open: <p style="display: inline;" id="open"></p><p style="display: inline; color:green;" id="currentpricediffopenup"></p><p style="display: inline; color:red;" id="currentpricediffopendown"></p></h3>
            <br>
            <h3>52-Week Range: <p style="display: inline;" id="weekhigh"></p> - <p style="display: inline;" id="weeklow"></p></h3>
            <br>
            <h3>Volume: <p style="display: inline;" id="volume"></p></h3>
            <br>
            <h3>Market Cap: $<p style="display: inline;" id="marketcap"></p></h3>
            <br><br><br>
          </div>
          <br>
        </div>
        <br>
        <div class="insight-companyinfo">
          <h2>Company Summary<h2>
          <p style="font-size:12px; margin-left:25px; margin-top:10px;"><p style="font-size:12px; margin-left:25px; margin-top:10px;" id="companysummary"></p></p>
        </div>
        <br>
      </div>
    </div>
    <div class="footer">
      <?php
        require 'footer.php';
      ?>
    </div>
  </body>
</html>
