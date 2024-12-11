<?php


// $name = "Sample name";
// $message = "Sample message";
// $email = "Sample email";

// $subject = "sample subject";
// $comment = "sample comment";
// $date = "9/9/9";

$name = $_POST['Name'];
$email = $_POST['Email'];
$subject = $_POST['Subject'];
$comment = $_POST['Comment'];


$message = "We have received a new idea to the AIG database from {$name}! Please check it out!\n\n<BR>".$subject."\n\n<BR>".$comment;




$date = date("y-m-d");

// Email Headers
$headers  = "From: The Amazing Ideas Group <ideas@etowndb.com>\n";
    $headers .= "Cc: example <englep@etown.edu>\n"; 
    $headers .= "X-Sender: example <englep@etown.edu>\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: ideas@etowndb.com\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

    // insert target email here
$to = "example@gmail.com";                                                                                              


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