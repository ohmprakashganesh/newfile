<?php


if(isset($_GET['email']) && (isset($_POST['submit']))) {
  $email=$_GET['email'];
  $code = $_POST['code'];
  include 'Conn.php';
  $sql="select code from login where email='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
  if($code==$row['code']) {
      header("Location:ChangePsd.php?email=$email");
  }else{
    // header("Location:EmailConfirmation.php?err=1");
    header("Location:ChangePsd.php?email=$email");

  }
}
else{
  echo "not on right track";

}
?>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="../CSS/login.css" />
    <script src="https://kit.fontawesome.com/f0ff125fe7.js" crossorigin="anonymous"></script>
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
        <form  method="post" action="#">  
         <label for="psd">Enter the code sent to your email</label>
          <div class="formdesign" id="code">
            <input type="text" placeholder="Code "id="code" name="code"/>
            <div class="btn">
              <input type="submit"  id="code" name="btn" value="Enter"/>
            </div>
            <p id="err1" class="error">
              <?php
              if(isset($_GET['err'])){
                echo "Confirmation Code didnot Match";
              }
            ?>
            </p>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>