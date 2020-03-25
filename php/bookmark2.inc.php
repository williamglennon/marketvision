<?php
  require 'database-connection.inc.php';

  $symbol = $_GET['symbol'];
  $status = $_GET['marked'];
  $user = $_GET['user'];

  if ($status == 'true'){
    $sql = "SELECT bookmark_id FROM bookmarks WHERE symbol=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../bookmarks.php?error=true");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, 's', $symbol);
      mysqli_stmt_execute($stmt);
      $results = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($results);
    }
    $bookmarkid = $row['bookmark_id'];

    $sql = "DELETE FROM bookmarksusers WHERE bookmark_id=? AND user_id=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../bookmarks.php?error=true");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $bookmarkid, $user);
      mysqli_stmt_execute($stmt);
      header("Location: ../bookmarks.php");
      exit();
    }
  }
  else{
    header("Location: ../bookmarks.php?error=true");
    exit();
  }
?>
