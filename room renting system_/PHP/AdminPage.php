<?php
session_start();
if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
    include('conn.php');
    $sql="select * from admin where id='$uid'";
    $result=$conn->query($sql);
    $row = $result->fetch_array();
}
else
{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_SESSION['uid'])){
    echo "Welcome : " . $row['admin_name'] . "<br>";
}
?>
</body>
</html>