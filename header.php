<?php
  session_start();
  $output = "";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Loading & Linking Scipts & Stylesheets -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" ></script>
    <link rel="stylesheet" href="styles/main-styles.css">
    <meta charset="utf-8">
    <!-- Website Title & Icon -->
    <link rel="icon" href="images\icon2.png">
    <title>Market Vision</title>
  </head>
  <body onload="startTime();">
    <div id="myModal" class="modal">
      <div class="modal-content">
        <h1 align="center">ATTENTION!</h1>
        <h3 align="center">The information on this site is provided with the understanding that Market Vision is not engaged in professional advice.</h3>
        <h3 align="center">Market Vision will not be liable to you or anyone else for any decision made or action taken in reliance on the information given.</h3>
        <h5 align="center">You can read more in our provided Disclaimer, Terms of Use & Privacy Policy.</h5>
        <span class="close">Accept</span>
      </div>
      <script>
        $(document).ready(function(){
          if ($.cookie('alert')== null) {
            $('#myModal').modal('show');
            $.cookie('alert', "2");
          }
        });
      </script>
    </div>
    <div class="header" id="navbar">
      <script src="js/basic-scripts.js"></script>
      <script src="js/home-scripts.js"></script>
      <div class="backingTicker">
        <div class="contentAreaTicker">
          <div class="toptrades"><b>TOP TRADES </b></div>
          <div class="clocktop" id="clock" align="right"></div>
        </div>
      </div>
      <div class="navhead">
        <div class="contentAreaNav">
          <div class="logocon">
            <a href="index.php" class="logo"><img id="my-img" src="images/logo2.png" width="200" height="60" onmouseover="hover(this);" onmouseout="unhover(this);"></a>
          </div>
          <div class="search">
            <div class="search-container">
              <form action="php\search.inc.php" method="post">
                <input class="searchbar" id="searchinput" onkeyup="realtimecheck()" type="text" placeholder="Search by Market Symbol..." name="search">
                <button type="submit">
                  <img src="images\searchicon.png" alt="searchicon" width="20" height="20">
                  <i class="main-search"></i>
                </button>
              </form>
              <div style="position:absolute;">
                <ul>
                  <script>
                    function realtimecheck(){
                      var x = document.getElementById("search-list");
                      x.style.display = "block";
                      var contents = document.getElementById("searchinput").value;
                      if (contents == ''){
                        x.style.display = "none";
                      }
                      var temp = '1. symbol';
                      var temp2 = '2. name';
                      var url = "https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=" + contents + "&apikey=K2B6KVTAUJXXVITZ";
                      $.getJSON( url )
                        .done(function( jsonfile ) {
                          document.getElementById("result1symbol").innerHTML = jsonfile.bestMatches[0][ '1. symbol' ];
                          document.getElementById("result1name").innerHTML = jsonfile.bestMatches[0][ '2. name' ];
                          document.getElementById("result2symbol").innerHTML = jsonfile.bestMatches[1][ '1. symbol' ];
                          document.getElementById("result2name").innerHTML = jsonfile.bestMatches[1][ '2. name' ];
                          document.getElementById("result3symbol").innerHTML = jsonfile.bestMatches[2][ '1. symbol' ];
                          document.getElementById("result3name").innerHTML = jsonfile.bestMatches[2][ '2. name' ];
                          document.getElementById("result4symbol").innerHTML = jsonfile.bestMatches[3][ '1. symbol' ];
                          document.getElementById("result4name").innerHTML = jsonfile.bestMatches[3][ '2. name' ];
                          document.getElementById("result5symbol").innerHTML = jsonfile.bestMatches[4][ '1. symbol' ];
                          document.getElementById("result5name").innerHTML = jsonfile.bestMatches[4][ '2. name' ];
                        })
                        .fail(function( jqxhr, textStatus, error ) {
                          var err = textStatus + ", " + error;
                          document.getElementById("result1symbol").innerHTML = "Request Failed: " + err;
                          document.getElementById("result1name").innerHTML = "Request Failed: " + err;
                        })
                    }
                  </script>
                  <div id="search-list" style="display: none;">
                    <li style="list-style: none; background-color: black; width: 545px;">
                      <button style="border-radius: 0px; color: black; text-decoration: none; width: 98%; margin-left: 1%; height: 120%; padding-top: 13px; padding-bottom: 13px;" onclick="location.href='insight.php?symbol=ba'">
                        <b style="float: left; margin-left: 10px;" id="result1symbol"></b>
                        <span style="display:inline-block; float: right; margin-right: 10px;" id="result1name"></span>
                      </button>
                    </li>
                    <li style="list-style: none; background-color: black; width: 545px;">
                      <button style="border-radius: 0px; color: black; text-decoration: none; width: 98%; margin-left: 1%; height: 120%; padding-top: 13px; padding-bottom: 13px;" onclick="location.href='insight.php?symbol=ba'">
                        <b style="float: left; margin-left: 10px;" id="result2symbol"></b>
                        <span style="display:inline-block; float: right; margin-right: 10px;" id="result2name"></span>
                      </button>
                    </li>
                    <li style="list-style: none; background-color: black; width: 545px;">
                      <button style="border-radius: 0px; color: black; text-decoration: none; width: 98%; margin-left: 1%; height: 120%; padding-top: 13px; padding-bottom: 13px;" onclick="location.href='insight.php?symbol=ba'">
                        <b style="float: left; margin-left: 10px;" id="result3symbol"></b>
                        <span style="display:inline-block; float: right; margin-right: 10px;" id="result3name"></span>
                      </button>
                    </li>
                    <li style="list-style: none; background-color: black; width: 545px;">
                      <button style="border-radius: 0px; color: black; text-decoration: none; width: 98%; margin-left: 1%; height: 120%; padding-top: 13px; padding-bottom: 13px;" onclick="location.href='insight.php?symbol=ba'">
                        <b style="float: left; margin-left: 10px;" id="result4symbol"></b>
                        <span style="display:inline-block; float: right; margin-right: 10px;" id="result4name"></span>
                      </button>
                    </li>
                    <li style="list-style: none; background-color: black; width: 545px;">
                      <button style="border-radius: 0px; color: black; text-decoration: none; width: 98%; margin-left: 1%; height: 120%; padding-top: 13px; padding-bottom: 13px;" onclick="location.href='insight.php?symbol=ba'">
                        <b style="float: left; margin-left: 10px;" id="result5symbol"></b>
                        <span style="display:inline-block; float: right; margin-right: 10px;" id="result5name"></span>
                      </button>
                    </li>
                    <li style="border-radius: 10px; margin-top: -13px; list-style: none; background-color: black; width: 545px;"><br></li>
                  </div>
                </ul>
              </div>
            </div>
          </div>
          <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="top-trades.php" style="display: block">Top Trades</a>
            <a href="bookmarks.php" style="display: block">Bookmarks</a>
            <p align="center" style="color: grey">________________________</p>
            <a href="about.php" style="display: block">About Site</a>
            <a href="contact.php" style="display: block">Contact Us</a>
            <a href="sitemap.php" style="display: block">Sitemap</a>
            <p align="center" style="color: grey">________________________</p>
            <p style="color: grey" align="center"><a style="font-size: 12px" href="privacy-policy.php">Privacy Policy</a><a style="font-size: 12px" href="terms-use.php">Terms of Use</a></p>
            <p style="color: grey" align="center"><a style="font-size: 12px" href="disclaimer.php" style="padding: 0px">Disclaimer</a></p>
          </div>
          <div class="memberbutton">
            <?php
              $openform = 'no';
              $usertemp = '';
              if (isset($_GET['error'])) {
                if ($_GET['error'] == "blankfield") {
                  $output = "Please fill in all fields.";
                  $openform = 'yes';
                  $usertemp = $_GET['u'];
                }
                else if ($_GET['error'] == "incorrectpsw") {
                  $output = "Incorrect Password.";
                  $openform = 'yes';
                  $usertemp = $_GET['u'];
                }
                else if ($_GET['error'] == "nouser") {
                  $output = "User not found.";
                  $openform = 'yes';
                }
                else if ($_GET['error'] == "sqlerror") {
                  $output = "Database error. <br> Please try again.";
                  $openform = 'yes';
                  $usertemp = $_GET['u'];
                }
              }
              else{
                $output = "";
              }
              if(isset($_SESSION['userId'])){
                echo $_SESSION['userUId'].' • <a href="php/logout.inc.php">Logout</a>';
              }
              else{
                echo '<a onclick="openForm()">Login </a> •
                <a href="register.php"> Register</a>
                <div class="form-popup" id="myForm">
                  <form action="php/login.inc.php" method="post" class="form-container">
                    <p style="text-align: center; background-color: red; border-radius: 5px; color:white;">'.$output.'</p>
                    <label for="user"><b>Username / E-Mail</b></label>
                    <input type="text" placeholder="Enter Username or E-Mail" value="'.$usertemp.'" name="user" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <input type="hidden" name="pagename" value="'.$_SERVER['REQUEST_URI'].'">
                    <a style="margin-top:10px;" align="center" href="password-reset.php">Forgot Password?</a>
                    <p style="margin-top:5px;"align="center"><button name="login-sub" type="submit" class="btn">Login</button>
                    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button></p>
                  </form>';
                  if ($openform == 'yes'){
                    echo '
                      <script>
                        openForm();
                      </script>
                    ';
                  }
              }
             ?>
            </div>
            <div class="menuwhole" onclick="openNav()">
              <div class="menuit"></div>
              <div class="menuit"></div>
              <div class="menuit"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
