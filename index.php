<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link rel="icon" href="images\icon2.png">
  <body onload="startTime();">
    <?php
      require 'header.php';
    ?>
    <div class="mainbody">
      <div class="contentArea">
        <div class="row">
          <div class="columnMainMarket">
            <h1 align="center">DOW</h1>
            <h3 align="center" style="color:red;"> 29,102.51 ▼ -266.26(0.94%)</h3>
          </div>
          <div class="columnMainMarket">
            <h1 align="center">S&P 500</h1>
            <h3 align="center" style="color:red;"> 3,327.71 ▼ -18.07(0.54%)</h3>
          </div>
          <div class="columnMainMarket">
            <h1 align="center">NASDAQ</h1>
            <h3 align="center" style="color:red;"> 9,520.51 ▼ -51.64(0.54%)</h3>
          </div>
        </div>
        <div class="row">
          <div class="columnRes">
            <h2 align="center">U.S. DOLLAR</h2>
            <h4 align="center" style="color:red;"> 98.66 ▼ -0.03(0.03%)</h4>
          </div>
          <div class="columnRes">
            <h2 align="center">GOLD</h2>
            <h4 align="center" style="color:green;"> 1,577.40 ▲ 4.10(0.25%)</h4>
          </div>
          <div class="columnRes">
            <h2 align="center">OIL</h2>
            <h4 align="center" style="color:red;"> 50.18 ▼ -0.15(0.30%)</h4>
          </div>
          <div class="columnRes">
            <h2 align="center">Bitcoin (BTC)</h2>
            <h4 align="center" style="color:red;"> 9,816.13 ▼ -258.16(2.63%)</h4>
          </div>
        </div>
        <div class="row">
          <div class="columnList">
            <h3 align="center">Most Popular</h3>
            <ol>
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
          </div>
          <div class="columnList">
            <h3 align="center">Highest Volume</h3>
            <ol>
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
          </div>
          <div class="columnList">
            <h3 align="center">Biggest Movers</h3>
            <ol>
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
          </div>
          <div class="columnList">
            <h3 align="center">Stocks in Play</h3>
            <ol>
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
          </div>
          <div class="columnList">
            <h3 align="center">Top Bookmarks</h3>
            <div class="bookmarkhomezone">
              <?php
                if(isset($_SESSION['userId'])){
                  echo'<ol>
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
                  </ol>';
                }
                else{
                  echo '<style>
                  .loginlink{
                    border: 5px solid grey;
                    border-radius: 8px;
                    background-color: grey;
                    color: white;
                  }
                  .loginlink:hover{
                    border: 5px solid black;
                    border-radius: 8px;
                    background-color: black;
                    color: white;
                    cursor: pointer;
                  }
                  </style>
                  <a class="loginlink" align="center" onclick="openForm()">Login</a>';
                }
               ?>
            </div>
          </div>
        </div>
        <h1 align="center">News & Headlines</h1>
        <div class="row">
          <div class="columnNewsLines">
            <h2 align="center">New York Times: Business</h2>
            <div id="widgetmain" style="text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583654805179&amp;x=https%3A%2F%2Frss.nytimes.com%2Fservices%2Fxml%2Frss%2Fnyt%2FBusiness.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=8&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
          </div>
          <div class="columnNewsLines">
            <h2 align="center">BBC: Business</h2>
            <div id="widgetmain" style="text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583654677154&amp;x=http%3A%2F%2Ffeeds.bbci.co.uk%2Fnews%2Fbusiness%2Frss.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=8&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
          </div>
          <div class="columnNewsLines">
            <h2 align="center">CNBC</h2>
            <div id="widgetmain" style="text-align:left;overflow-y:auto;overflow-x:hidden;width:95%;background-color:#transparent; border:0px solid #333333;"><div id="rsswidget" style="height:1000px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1583655496650&amp;x=http%3A%2F%2Fwww.cnbc.com%2Fid%2F19746125%2Fdevice%2Frss%2Frss.xml&amp;w=250&amp;h=700&amp;bc=333333&amp;bw=0&amp;bgc=transparent&amp;m=7&amp;it=false&amp;t=(default)&amp;tc=333333&amp;ts=15&amp;tb=transparent&amp;il=true&amp;lc=0000FF&amp;ls=20&amp;lb=true&amp;id=true&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=10" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:100%; height:1000px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:0px solid #333333;" id="widgetbottom"><span style="font-size:70%">&nbsp;</span><br></div></div>
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
