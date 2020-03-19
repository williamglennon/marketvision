<?php
  session_start();
  session_unset();
  session_destroy();
  $previousPage = $_POST['pagename2'];
  header("Location: ../".$previousPage."?logout=success");
?>
