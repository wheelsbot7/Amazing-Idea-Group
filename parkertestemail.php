<?php


$name = "Sample name";
$message = "Sample message";
$email = "Sample email";

$subject = "sample subject";
$comment = "sample comment";
$date = "9/9/9";

$headers = "Sample header";
$to = "pme0420@gmail.com";


if(mail($to, 'New message from your website', $message, $headers)){
    echo "Thank you! Your message has been sent. Please allow us 3-5 business days to respond.";
    //header("refresh:5;url=index.php"); // Redirect after 5 seconds
    }else {
    echo "Oops! Something went wrong while sending the email.";
    echo error_get_last()['message'];
}

$sql = 'INSERT INTO pending(name,email,subject, startDate) VALUES ($name,$email, $subject,CURRENT_DATE)';
if(mysqli_query($conn,$sql)){
    echo "Record inserted successfully";
}else{
    echo "Could not insert record: ". mysqli_error($conn);

}
mysqli_close($conn);

?>