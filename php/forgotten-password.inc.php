<?php
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];

  if(empty($password1) || empty($password2)){
    header("Location: ../forgotten-password.php?error=emptyfield&selector=".$selector."&validator=".$validator);
    exit();
  }
  else if($password1 != $password2){
    header("Location: ../forgotten-password.php?error=pwdnomatch&selector=".$selector."&validator=".$validator);
    exit();
  }

  $currentDate = date("U");

  require "database-connection.inc.php";

  $sql = "SELECT * FROM passwordreset WHERE passwordResetSelector=? AND passwordResetExpires >= ?;";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);
    if(!$row = mysqli_fetch_assoc($results)){
      header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
      exit();
    }
    else{
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["passwordResetToken"]);

      if($tokenCheck == false){
        header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
        exit();
      }
      else if($tokenCheck == true){
        $tokenEmail = $row["passwordResetEmail"];

        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
          mysqli_stmt_execute($stmt);

          $results = mysqli_stmt_get_result($stmt);
          if(!$row = mysqli_fetch_assoc($results)){
            header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
            exit();
          }
          else{
            $sql = "UPDATE users SET password=? WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
              exit();
            }
            else{
              $passwordhashed = password_hash($password1, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, 'ss', $passwordhashed, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM passwordreset WHERE passwordResetEmail=?;";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../forgotten-password.php?error=invalid&selector=".$selector."&validator=".$validator);
                exit();
              }
              else{
                mysqli_stmt_bind_param($stmt, 's', $userEmail);
                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);
                mysqli_close($conn);

                header("Location: ../forgotten-password.php?reset=success");
              }

            }
          }
        }
      }
    }
  }
?>
