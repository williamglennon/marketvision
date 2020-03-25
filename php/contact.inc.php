<?php
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $email_from = 'marketvision@WEBSITE HERE';
  $to = "EMAIL HERE";

  $email_subject = "New Form Submission - $subject";
  $email_body = "Submitter's Name : $fname $lname \n".
                "Submitter's E-Mail : $email \n".
                "Message : $message \n";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email \r\n";
  mail($to,$email_subject,$email_body,$headers);
  header("Location: contact.php");
?>
