<?php
  if(isset($_GET['email'])){
  
    echo $email = $_GET['email'];
//     if(empty($email))
//     header("Location:EmailConfirmation.php");
//  }
//  else{
//   header("Location:Forgot.php");
//  }
// if(isset($_POST['Change'])){
//   include 'Conn.php';
//   $psd=$_POST['psd'];
//   //$hashedPsd = password_hash($psd, PASSWORD_DEFAULT);
//   if(empty($psd)||(strlen($psd))>25){
//     header("Location:ChangePsd.php?error=l");
//   }
//   else{
//   $sql = "UPDATE login SET password='$psd' where email='$email'";
//   if( $conn->query($sql)===true){
//     header("Location:login.php?message=l");
//   }
// }
}
?>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="../CSS/login.css" />
  </head>
  <body>
    <div class="container">
    <div class="motto">
            <img src="../IMAGE/Room.jpg" alt="Room Picture">
            <h3>FEEL LIKE HOME</h3>
            <p>Chhaano Room Renting System</p>
        </div>
      <div class="formbox">
      <div class="inputbox">
        <form  method="post">
        <div class="input-group">
        <label for="psd">New Password</label> 
            <div class="formdesign" id="password">
              <input type="Password" placeholder="Password " id="psd" name="psd"/><br>
              </div>  
              <p id="err1" class="error">
              <?php
              if(isset($_GET['error'])){
                echo "Password Should be in range of (8-25) Characters";
              }
              if(isset($_GET['err'])){
                echo "Passwords didnot match";
              }
            ?>
            </p>
          <div class="btn">
          <input type="submit" value="Change Password" name="Change" onkeyup="return Verify()">
          </div>
        </form>
      </div>
    </div>
  </body>
  <script>
    function Verify(){
      returnval=false;
      pass=document.getElementById('psd').value.trim();
      if(pass== ""){
            seterror("pass","*Required");
            returnval= false;
        }
        else{
        if(pass.length <8){
            seterror("pass","*Required Length(8)");
            returnval= false;
        }
       }
       return returnval;
    }
  </script>
</html>