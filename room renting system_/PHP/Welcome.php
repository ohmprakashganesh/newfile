<?php
if(isset($_GET['email'])) {
    $email=$_GET['email'];
    $to = $email;
    $subject = 'Welcome';
    $content =  'Welcome to Chaano Now Feel Free to rent a room as per your comfort';
    $headers = "";
    if(mail($to, $subject, $content, $headers)) {
        header("Location:login.php?success=1");
    }
}
else{
    header("Location:signup.php?success=1");
    }
?>