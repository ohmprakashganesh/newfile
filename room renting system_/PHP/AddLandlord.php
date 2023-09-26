<?php
session_start();

$temp=$_GET['temp'];
if(empty($temp)){
$email = $_SESSION['uid'];
include 'Conn.php';

$sql = "SELECT * FROM login WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['name'];
$phone = $row['phone'];

$sql1 = "SELECT * FROM landlord WHERE lemail = '$email'";
$result1 = $conn->query($sql1);

if ($result1 === false) {
    echo "Error executing SQL query: " . $conn->error;
    exit();
}

if ($result1->num_rows > 0) { 
  // echo 'yes';
    $_SESSION['uid'] = $email;
    header("Location: AddRoom.php");
    exit();
} else {
  // echo 'No';
    $sql2 = "INSERT INTO landlord (lname, lphone, lemail) VALUES ('$name', '$phone', '$email')";
    if ($conn->query($sql2) === TRUE) {
      $_SESSION['uid'] = $email;
        header("Location: AddRoom.php");
        exit();
    } else {
        echo "Error executing SQL query: " . $conn->error;
        exit();
    }
}
}
else
{
  header('Location:signup.php');
}
?>

