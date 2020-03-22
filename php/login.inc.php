<?php
    require 'database-connection.inc.php';

    //Connect Variables from form
    $username = $_POST['user'];
    $passwordNoHash = $_POST['psw'];
    $previousPage = $_POST['pagename'];

    if(empty($username) || empty($passwordNoHash)){
      //One of the fields was left blank

      if(strpos($previousPage, '?')){
        header("Location: ..".$previousPage."&error=blankfield&u=".$username);
      }
      else{
        header("Location: ..".$previousPage."?error=blankfield&u=".$username);
      }
      exit();
    }
    else{
      $sql = "SELECT * FROM Users WHERE username=? OR email=?;";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        if(strpos($previousPage, '?')){
          header("Location: ..".$previousPage."&error=sqlerror&u=".$username);
        }
        else{
          header("Location: ..".$previousPage."?error=sqlerror&u=".$username);
        }
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($results)){
          $passwordCheck = password_verify($passwordNoHash, $row['password']);
          if($passwordCheck == false){
            //error incorrect password
            if(strpos($previousPage, '?')){
              header("Location: ..".$previousPage."&error=incorrectpsw&u=".$username);
            }
            else{
              header("Location: ..".$previousPage."?error=incorrectpsw&u=".$username);
            }
            exit();
          }
          else if($passwordCheck == true){
            session_start();
            $_SESSION['userId'] = $row['user_id'];
            $_SESSION['userUId'] = $row['username'];
            //login successful
            if(strpos($previousPage, '?')){
              header("Location: ..".$previousPage."&login=success");
            }
            else{
              header("Location: ..".$previousPage."?login=success");
            }
            exit();
          }
          else{
            //error incorrect password
            if(strpos($previousPage, '?')){
              header("Location: ..".$previousPage."&error=incorrectpsw&u=".$username);
            }
            else{
              header("Location: ..".$previousPage."?error=incorrectpsw&u=".$username);
            }
            exit();
          }
        }
        else{
          //error no user found
          if(strpos($previousPage, '?')){
            header("Location: ..".$previousPage."&error=nouser");
          }
          else{
            header("Location: ..".$previousPage."?error=nouser");
          }
          exit();
        }
      }
    }
?>
