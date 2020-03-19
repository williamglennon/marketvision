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
        <p style="font-size: 1px">  .</p>
        <div class="insight-head">
          <h1>Symbol - Company Name</h1>
          <?php
            if(isset($_SESSION['userId'])){
              echo'<form action="bookmark-handler.php" method="post" class="bookmark-form">
                <button type="bookmark">
                  <img src="images\bookmark.png" alt="bookmarkicon" width="20" height="20">
                </button>
              </form>';
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
        <p style="font-size: 1px">  .</p>
        <div style="border-bottom: 1.5px solid black;" class="row">
          <div class="insight-maingraph">

          </div>
          <div class="insight-maingraph">
            <h2>Current Price: </h2>
            <h2>Industry - Sector</h2>
            <h3>52-Week Range: </h3>
            <h3>Previous Close: </h3>
            <h3>Open: </h3>
            <h3>Volume: </h3>
            <h3>Market Cap: </h3>
          </div>
          <p style="font-size: 1px">  .</p>
        </div>
        <p style="font-size: 1px">  .</p>
        <div class="insight-companyinfo">
          <h2>Company Summary<h2>
          <p style="font-size:12px;" id="companysummary"></p>
          <script>
          $.getJSON( "./python/datacf.json" )
            .done(function( json ) {
              document.getElementById("companysummary").innerHTML = json.summary;
            })
            .fail(function( jqxhr, textStatus, error ) {
              var err = textStatus + ", " + error;
              document.getElementById("companysummary").innerHTML = "Request Failed: " + err;
          });
          </script>
        </div>
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
