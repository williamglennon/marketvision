<?php
  $servername = "localhost";
  $databaseuser = "root";
  $databasepassword = "";
  $databasename = "test";

  $conn = mysqli_connect($servername, $databaseuser, $databasepassword, $databasename);

  if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
  }
?>
