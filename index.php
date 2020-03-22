<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <br>
        <div class="row">
          <div class="columnMainMarket">
            <h1 align="center">DOW</h1>
            <?php

              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-summary?region=US&lang=en",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
                  "x-rapidapi-key: 6b470c0987mshd8d24f1fb82e8abp1b66d9jsn5e960b13d09d"
                ),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);

              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[1]->regularMarketChange->fmt >= 0){
                  echo '<h3 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[1]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[1]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[1]->regularMarketChangePercent->fmt.')</h3>';
                }
                else if ($decode->marketSummaryResponse->result[1]->regularMarketChange->fmt < 0){
                  echo '<h3 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[1]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[1]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[1]->regularMarketChangePercent->fmt.')</h3>';
                }
              }
            ?>
          </div>
          <div class="columnMainMarket">
            <h1 align="center">S&P 500</h1>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[0]->regularMarketChange->fmt >= 0){
                  echo '<h3 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[0]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[0]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[0]->regularMarketChangePercent->fmt.')</h3>';
                }
                else if ($decode->marketSummaryResponse->result[0]->regularMarketChange->fmt < 0){
                  echo '<h3 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[0]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[0]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[0]->regularMarketChangePercent->fmt.')</h3>';
                }
              }
            ?>
          </div>
          <div class="columnMainMarket">
            <h1 align="center">NASDAQ</h1>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[2]->regularMarketChange->fmt >= 0){
                  echo '<h3 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[2]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[2]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[2]->regularMarketChangePercent->fmt.')</h3>';
                }
                else if ($decode->marketSummaryResponse->result[2]->regularMarketChange->fmt < 0){
                  echo '<h3 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[2]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[2]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[2]->regularMarketChangePercent->fmt.')</h3>';
                }
              }
            ?>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="columnRes">
            <h2 align="center">U.S. DOLLAR - EURO</h2>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[7]->regularMarketChange->fmt >= 0){
                  echo '<h4 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[7]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[7]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[7]->regularMarketChangePercent->fmt.')</h4>';
                }
                else if ($decode->marketSummaryResponse->result[7]->regularMarketChange->fmt < 0){
                  echo '<h4 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[7]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[7]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[7]->regularMarketChangePercent->fmt.')</h4>';
                }
              }
            ?>
          </div>
          <div class="columnRes">
            <h2 align="center">GOLD</h2>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[5]->regularMarketChange->fmt >= 0){
                  echo '<h4 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[5]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[5]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[5]->regularMarketChangePercent->fmt.')</h4>';
                }
                else if ($decode->marketSummaryResponse->result[5]->regularMarketChange->fmt < 0){
                  echo '<h4 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[5]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[5]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[5]->regularMarketChangePercent->fmt.')</h4>';
                }
              }
            ?>
          </div>
          <div class="columnRes">
            <h2 align="center">OIL</h2>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[4]->regularMarketChange->fmt >= 0){
                  echo '<h4 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[4]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[4]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[4]->regularMarketChangePercent->fmt.')</h4>';
                }
                else if ($decode->marketSummaryResponse->result[4]->regularMarketChange->fmt < 0){
                  echo '<h4 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[4]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[4]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[4]->regularMarketChangePercent->fmt.')</h4>';
                }
              }
            ?>
          </div>
          <div class="columnRes">
            <h2 align="center">BITCOIN (BTC)</h2>
            <?php
              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                if ($decode->marketSummaryResponse->result[12]->regularMarketChange->fmt >= 0){
                  echo '<h4 align="center" style="color:green;">'.$decode->marketSummaryResponse->result[12]->regularMarketPrice->fmt.' ▲ +'.$decode->marketSummaryResponse->result[12]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[12]->regularMarketChangePercent->fmt.')</h4>';
                }
                else if ($decode->marketSummaryResponse->result[12]->regularMarketChange->fmt < 0){
                  echo '<h4 align="center" style="color:red;">'.$decode->marketSummaryResponse->result[12]->regularMarketPrice->fmt.' ▼ '.$decode->marketSummaryResponse->result[12]->regularMarketChange->fmt.' ('.$decode->marketSummaryResponse->result[12]->regularMarketChangePercent->fmt.')</h4>';
                }
              }
            ?>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="columnList">
            <h3 style="margin-left:30px;">Most Popular</h3>
            <ol style="margin-left:30px; margin-top:5px;">
              <?php
                require 'php/database-connection.inc.php';
                $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id GROUP BY bookmarks.bookmark_id ORDER BY COUNT(bookmarksusers.user_id) DESC LIMIT 10;";
                $results = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($results)){
                  echo '<li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$row[0].'">'.$row[0].'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>';
                }
              ?>
            </ol>
          </div>
          <div class="columnList">
            <h3>Highest Volume</h3>
            <?php
              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-movers?region=US&lang=en",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
                  "x-rapidapi-key: 6b470c0987mshd8d24f1fb82e8abp1b66d9jsn5e960b13d09d"
                ),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);

              if ($err) {
                echo "<p>API Error:" . $err.". Please try again</p>";
              } else {
                $decode = json_decode($response);
                echo '<ol style="margin-top:5px;">
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[0]->symbol.'">'.$decode->finance->result[2]->quotes[0]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[1]->symbol.'">'.$decode->finance->result[2]->quotes[1]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[2]->symbol.'">'.$decode->finance->result[2]->quotes[2]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[3]->symbol.'">'.$decode->finance->result[2]->quotes[3]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[4]->symbol.'">'.$decode->finance->result[2]->quotes[4]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                  <li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[2]->quotes[5]->symbol.'">'.$decode->finance->result[2]->quotes[5]->symbol.'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>
                </ol>
                ';
              }
            ?>
          </div>
          <div class="columnList">
            <h3  style="margin-left:-7px;">Biggest Movers</h3>
            <div style="float: left; width:50%;">
              <h4 style="margin-top:5px; margin-left:-30px;">Gainers</h4>
              <?php
                if ($err) {
                  echo "<p>API Error:" . $err.". Please try again</p>";
                } else {
                  $decode = json_decode($response);
                  echo '<ol style="margin-top:5px;">
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[0]->symbol.'">'.$decode->finance->result[0]->quotes[0]->symbol.' ▲</a></li>
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[1]->symbol.'">'.$decode->finance->result[0]->quotes[1]->symbol.' ▲</a></li>
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[2]->symbol.'">'.$decode->finance->result[0]->quotes[2]->symbol.' ▲</a></li>
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[3]->symbol.'">'.$decode->finance->result[0]->quotes[3]->symbol.' ▲</a></li>
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[4]->symbol.'">'.$decode->finance->result[0]->quotes[4]->symbol.' ▲</a></li>
                    <li style="margin-top:5px; margin-left:-30px;"><a style="margin-top:3px; color:green; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[0]->quotes[5]->symbol.'">'.$decode->finance->result[0]->quotes[5]->symbol.' ▲</a></li>
                    </ol>
                  ';
                }
              ?>
            </div>
            <div style="float: left; width:50%;">
              <h4 style="margin-top:5px; margin-left:-3px;">Losers</h4>
              <?php
                if ($err) {
                  echo "<p>API Error:" . $err.". Please try again</p>";
                } else {
                  $decode = json_decode($response);
                  echo '<ol style="margin-top:5px; margin-left:10px;">
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[0]->symbol.'">'.$decode->finance->result[1]->quotes[0]->symbol.' ▼</a></li>
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[1]->symbol.'">'.$decode->finance->result[1]->quotes[1]->symbol.' ▼</a></li>
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[2]->symbol.'">'.$decode->finance->result[1]->quotes[2]->symbol.' ▼</a></li>
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[3]->symbol.'">'.$decode->finance->result[1]->quotes[3]->symbol.' ▼</a></li>
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[4]->symbol.'">'.$decode->finance->result[1]->quotes[4]->symbol.' ▼</a></li>
                    <li style="margin-top:5px; margin-left:-20px;"><a style="margin-top:3px; margin-left:10px; color:red; text-decoration: none;" href="insight.php?symbol='.$decode->finance->result[1]->quotes[5]->symbol.'">'.$decode->finance->result[1]->quotes[5]->symbol.' ▼</a></li>
                    </ol>
                  ';
                }
              ?>
            </div>
          </div>
          <div class="columnList">
            <h3>Stocks in Play</h3>
            <br>
            <p style="margin-left:15px;">Coming Soon..</p>
<!--
            <ol  style="margin-top:5px;">
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
              <li>test</li>
            </ol>
-->
          </div>
          <div class="columnList">
            <h3 style="display: inline">Top Bookmarks</h3>

            <p style="display: inline; font-size:10pt; margin-left:5px;">(<a style="color:grey; text-decoration: none;" href="bookmarks.php">See All</a>)</p>
            <div class="bookmarkhomezone">
              <?php
                if(isset($_SESSION['userId'])){
                  $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id WHERE bookmarksusers.user_id=".$_SESSION['userId']." LIMIT 10;";
                  $results = mysqli_query($conn, $sql);
                  if(!($row = mysqli_fetch_assoc($results))){
                    echo'<br><br><br><p style="margin-left:3%;"><i>You have no Bookmarks.</i></p>
                    <br><br><br><br><br>';
                  }
                  else{
                    $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id WHERE bookmarksusers.user_id=".$_SESSION['userId']." LIMIT 10;";
                    $results = mysqli_query($conn, $sql);
                    echo'<ol  style="margin-top:5px;">';
                    while($row = mysqli_fetch_array($results)){
                      echo '<li><a style="margin-top:3px; color:black; text-decoration: none;" href="insight.php?symbol='.$row[0].'">'.$row[0].'     <img style="display:inline-block; float:middle; margin-bottom:-9px;" src="images\graph.png" width="30"height="30"></a></li>';
                    }
                    echo'</ol>';
                  }
                }
                else{
                  echo '<style>
                  .loginlink:hover{
                    color: gray;
                    cursor: pointer;
                  }
                  </style>
                  <div style="background-color: gainsboro; border-radius: 7px; width:90%;">
                    <br><br><br><a style="margin-left:9%;" class="loginlink" onclick="openForm()"><i><p style="margin-left:7%;">Please login to display </p><p style="margin-left:17%;">your bookmarks.</p></i></a>
                    <br><br><br><br><br>
                  </div>';
                }
               ?>
            </div>
          </div>
        </div>
        <br>
        <h1 align="center">News & Headlines</h1>
        <br>
        <div class="row">
          <div class="columnNewsLines">
            <h2 align="center">New York Times: Business</h2>
            <br>
            <div id="widgetmain" style="margin-top:15px;text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583654805179&amp;x=https%3A%2F%2Frss.nytimes.com%2Fservices%2Fxml%2Frss%2Fnyt%2FBusiness.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=8&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
          </div>
          <div class="columnNewsLines">
            <h2 align="center">BBC: Business</h2>
            <br>
            <div id="widgetmain" style="margin-top:15px;text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583654677154&amp;x=http%3A%2F%2Ffeeds.bbci.co.uk%2Fnews%2Fbusiness%2Frss.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=8&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
          </div>
          <div class="columnNewsLines">
            <h2 align="center">CNBC</h2>
            <br>
            <div id="widgetmain" style="margin-top:15px;text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583655496650&amp;x=http%3A%2F%2Fwww.cnbc.com%2Fid%2F19746125%2Fdevice%2Frss%2Frss.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=7&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
          </div>
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
