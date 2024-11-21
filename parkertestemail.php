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

//Loads connection code from team
require "dbconnection.php";
//we would have $conn at this point as a variable that has been connected to the database using mysqli

//looks like $connection is setup as a PDO object
$sql = $conn->prepare("INSERT INTO pending(name,email,subject,comment) VALUES (?,?,?,?);");
$sql->bind_param("ssss", $name, $email, $subject, $comment); // No SQLi allowed
$sql->execute();

// $sql = "INSERT INTO pending(name,email,subject, startDate) VALUES ('{$name}','{$email}', '{$subject}',CURRENT_DATE());"

// //looks like $conn is setup with mysqli_connect
// if(mysqli_query($conn,$sql)){
//     echo "Record inserted successfully";
// }else{
//     echo "Could not insert record: ". mysqli_error($conn);

// }
// mysqli_close($conn);

?>