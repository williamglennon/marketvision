<?php
    require 'database-connection.inc.php';

    //Connect Variables from form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
    $passwordNoHash = $_POST['password'];

    //Error Handlers for inputs
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
      //checks for valid email and user
      header("Location: ../register.php?error=invalidmailuser&fn=".$firstname."&ln=".$lastname."&bd=".$birthday);
      exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      //checks for valid email
      header("Location: ../register.php?error=invalidmail&fn=".$firstname."&ln=".$lastname."&bd=".$birthday."&u=".$username);
      exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      //checks for user to only include letters and numbers
      header("Location: ../register.php?error=invaliduser&fn=".$firstname."&ln=".$lastname."&m=".$email."&bd=".$birthday);
      exit();
    }
    else{
      //check if user or email is already taken
      $sql = "SELECT username FROM Users WHERE username=? OR email=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../register.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&m=".$email."&bd=".$birthday."&u=".$username);
        exit;
      }
      else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
          header("Location: ../register.php?error=taken&fn=".$firstname."&ln=".$lastname."&bd=".$birthday);
          exit();
        }
        else{
          //create user's Account
          $sql = "INSERT INTO Users (firstname, lastname, email, birthday, username, password) VALUES (?, ?, ?, ?, ?, ?);";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?error=sqlerror&fn=".$firstname."&ln=".$lastname."&m=".$email."&bd=".$birthday."&u=".$username);
            exit;
          }
          else{
            $passwordHash = password_hash($passwordNoHash, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $birthday, $username, $passwordHash);
            mysqli_stmt_execute($stmt);
            //successful signup
            header("Location: ../register.php?register=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
