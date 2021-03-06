<?php

function writeTofile($message) {
   try {
      //$file = fopen("contacts.txt", "a");
      //fwrite($file, $message);// . "\n")
      file_put_contents("contacts.txt", $message, FILE_APPEND);
      //fclose($file);
   }catch(Exception $ex){
      echo $ex->getMessage();
      return $ex->getMessage();
   }
   return true;
}

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'john.pedra@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Findyl Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$file_body = "Name: $name | Email: $email_address | Phone: $phone | Message:$message\n";
$headers = "From: john.pedra@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	

return writeTofile($file_body);
//mail($to,$email_subject,$email_body,$headers);
//return true;			
?>