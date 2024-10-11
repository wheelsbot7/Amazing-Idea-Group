<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $comment = $_POST['Comment'];

    // Construct email message with user input data
    $message = "Name: $name\nEmail: $email\nSubject: $subject\nComment: $comment";

    // Set additional headers (from email and content type)
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Recipient email address
    $to = 'alhussainianfal@gmail.com'; // Replace with your email address

    // Send the email using mail() function
    if (mail($to, 'New message from your website', $message, $headers)) {
        echo "Thank you! Your message has been sent. Please allow us 3-5 business days to respond.";
        header("refresh:5;url=index.php"); // Redirect after 5 seconds
    } else {
        echo "Oops! Something went wrong while sending the email.";
        echo error_get_last()['message'];
    }
}
?>