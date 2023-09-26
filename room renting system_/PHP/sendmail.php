<?php
include 'Conn.php';
//setcookie('myNumber', $code, time() + (10*60), '/'); 
if (isset($_GET['bemail'])) {

    $to_email = $_GET['bemail'];
    $subject = "code ";
    $body = rand(100000, 999999);
    $headers = "From: ohmprakshganesh@gmail.com";
    
    
    if (mail($to_email, $subject, $body, $headers)) {
        $sql = "UPDATE login SET code='$body' WHERE email='$to_email'";
if ($conn->query($sql)){
    header("Location: EmailConfirmation.php?email=$to_email");
   
}else{
    echo "not send ";
}
}
else {
    header("Location: Forgot.php");
    echo "you are on wrong";
   
}

}
?>
 