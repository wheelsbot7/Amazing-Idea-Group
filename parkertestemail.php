<?php


mail("pme420@gmail.com", 'New message from your website', "The Message", "The Headers")) {
    echo "Thank you! Your message has been sent. Please allow us 3-5 business days to respond.";
    header("refresh:5;url=index.php"); // Redirect after 5 seconds
}

?>