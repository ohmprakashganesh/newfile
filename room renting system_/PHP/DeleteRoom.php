<?php
session_start();
if(isset($_GET['rid'])) {
    include 'Conn.php';
    $roomno = $_GET['rid'];
    $sql = "DELETE FROM rooms WHERE roomno= '$roomno'";
    $result = $conn->query($sql);
    $conn->query($sql);
    header("Location: SuccessDeletionPage.php");
}
else{
    header("Location:LandlordLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>