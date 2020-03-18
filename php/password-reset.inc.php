<?php
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "www.marketvision.jamesdenbow.com/forgotten-password.php?selector=".$selector."&validator=".bin2hex($token);

  $expires = date("U") + 1800; //Adds 1 hour (1800 seconds) to current time

  require 'database-connection.inc.php';

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM passwordreset WHERE passwordResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../password-reset.php?error=sqlerror");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, 's', $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO passwordreset (passwordResetEmail, passwordResetSelector, passwordResetToken, passwordResetExpires) VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../password-reset.php?error=sqlerror");
    exit();
  }
  else{
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'ssss', $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;
  $subject = "Password Reset for MarketVision";
  $message = "<p>We recieved a password reset request for your Market Vision account. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>";
  $message .= "<p>Here is your password reset link: </br>";
  $message .= '<a> href="'.$url.'">'.$url.'</a></p>';

  $headers = "From: MarketVision <marketvision@jamesdenbow.com>\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  header("Location: ../password-reset.php?reset=success");
?>
