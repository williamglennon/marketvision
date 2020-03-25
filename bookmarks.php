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
        <br>
        <?php
          if (isset($_SESSION['userId'])){
            echo "<h1 style='margin-left: 150px;'>".$_SESSION['userUId']."'s Bookmarks</h1>";
            require 'php/database-connection.inc.php';

            $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id WHERE bookmarksusers.user_id=".$_SESSION['userId'].";";
            $results = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($results);
            if($rowcount <= 0){
              echo "<br><h3>You have no bookmarks currently.</h3>";
            }
            else{
              $stringhold1 = "'images/bookmark-hover.png'";
              $stringhold2 = "'images/bookmark-fill.png'";
              $sql = "SELECT bookmarks.symbol FROM bookmarks INNER JOIN bookmarksusers ON bookmarks.bookmark_id=bookmarksusers.bookmark_id WHERE bookmarksusers.user_id=".$_SESSION['userId'].";";
              $results = mysqli_query($conn, $sql);
              echo '<div class="row">
                      <div class="columnNewsLines">
                        <ul>';
              while($row = mysqli_fetch_array($results)){
                echo'<li style="margin-top:20px;" align="right"><a href="insight.php?symbol='.$row[0].'"><h2 style="display:inline-block;">'.$row[0].'</h2><img style="display:inline-block; float:middle; margin-bottom:-9px; margin-left:15px;" src="images\graph.png" width="35"height="35"></a><a style="display:inline-block; float:middle; margin-bottom: -3px; margin-left:100px;" href="php\bookmark2.inc.php?symbol='.$row[0].'&user='.$_SESSION['userId'].'&marked=true"><img src="images\bookmark-fill.png" onmouseover="this.src='.$stringhold1.'" onmouseout="this.src='.$stringhold2.'" width="23"height="23"></a></li>';
              }
              echo'</ul>
                    </div>
                      </div>';
            }
          }
          else{
            echo "<br><a align='center' style='cursor: pointer;' onclick='openForm()'><h1>Please Login to view your bookmarks.</h1></a>";
          }
        ?>
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
