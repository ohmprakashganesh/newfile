<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];

  if(strlen($email)>0) {
    include'Conn.php';
    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($conn,$sql) ;
     $row=mysqli_fetch_assoc($result);
     $demail=$row['email'];
    if ($email==$demail){
        header("Location:sendmail.php ?bemail=$email");
    }
       
     else {
        header("Location:Forgot.php?error=1");
       

       
    }
  }
else{
  header("Location:forgot.php?message=1");
  

}
}

// }
?>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="../CSS/login.css" />
  </head>
  <body>
<div class="container">
<div class="motto">
            <img src="../IMAGE/Room.jpg" alt="Room Picture">
            <h3>FEEL LIKE HOME.</h3>
            <p>Chhaano Room Renting System</p>
        </div>
<div class="formbox">
  <div class="inputbox">
  <form method="post">
  <div class="error" style="color:red">
        <?php
       if (isset($_GET['error'])) {
       echo "Email not Found!";
       }
       ?>
       <?php
       if (isset($_GET['message'])) {
       echo "Enter Email Address!";
       }
       ?>
  </div>     
      <div class="formdesign" id="email">
        <input type="email" placeholder="Enter Email Address" id="emial" name="email"/>
      </div>
      <div class="btn">
      <input type="submit" value="Send Code" name="submit">
      </div>
</form>
</div>
</div>
</div>
</body>
</html>