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
                <input class="searchbar" type="text" placeholder="Search by Market Symbol..." name="search">
                <button type="submit">
                  <img src="images\searchicon.png" alt="searchicon" width="20" height="20">
                  <i class="main-search"></i>
                </button>
              </form>
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
              if (isset($_GET['error'])) {
                if ($_GET['error'] == "blankfield") {
                  $output = "Please fill in all fields.";
                }
                else if ($_GET['error'] == "incorrectpsw") {
                  $output = "Incorrect Password.";
                }
                else if ($_GET['error'] == "nouser") {
                  $output = "User not found.";
                }
                else if ($_GET['error'] == "sqlerror") {
                  $output = "Database error. <br> Please try again.";
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
                    <input type="text" placeholder="Enter Username or E-Mail" name="user" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <input type="hidden" name="pagename" value="'.$_SERVER['REQUEST_URI'].'">
                    <a style="margin-top:10px;" align="center" href="password-reset.php">Forgot Password?</a>
                    <p style="margin-top:5px;"align="center"><button name="login-sub" type="submit" class="btn">Login</button>
                    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button></p>
                  </form>';
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
