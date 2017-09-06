<?php
if(isset($_POST['email'])) {

    $email_to = "jdc@jamesdeancaldwell.com";
    $email_subject = "Katan Website - Inquiry";
 
    function died($error) {
      if (! (isset($_POST['fullname']) && strlen($_POST['fullname']))) 
        {
        echo "<script type=\"text/javascript\">window.alert('You must enter a vaild email address');
        window.location.href = 'http://jamesdeancaldwell.github.io/html/contact.html#form-copy';</script>"; 
        exit;
        }
            }

    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= '<br />';
  }
 

  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";
 
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "<script type=\"text/javascript\">window.alert('Thank you, your message has been successfully sent.');
    window.location.href = 'http://jamesdeancaldwell.github.io/index.php';</script>";
  }
?>

