<?php

$to = "pme0420@gmail.com";
$message = "Sample message";
$headers = "Sample header";

if(mail($to, 'New message from your website', $message, $headers)){
    echo "Thank you! Your message has been sent. Please allow us 3-5 business days to respond.";
    //header("refresh:5;url=index.php"); // Redirect after 5 seconds
    }else {
    echo "Oops! Something went wrong while sending the email.";
    echo error_get_last()['message'];
}


?>