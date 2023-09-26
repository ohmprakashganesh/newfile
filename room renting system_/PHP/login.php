<?php
session_start();
if (isset($_SESSION['uid'])) {
    header("Location: AddLandlord.php");
    exit();
}
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    include('Conn.php');
    $sql = "SELECT * FROM login WHERE id='$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    header("Location:AddLandlord.php?welcome=1");
} 
if (isset($_POST['Login'])) {
    include 'Conn.php';
    $email = $_POST['email'];
    $psd = $_POST['psd'];
    $sql = "SELECT * FROM login WHERE email='$email' AND password='$psd'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            $_SESSION['status'] = 1;
            $_SESSION['uid'] = $row['id'];
            header("Location: AddLandlord.php");
        } else {
          header("Location: login.php?error=1");
        }
      }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container">
    <div class="motto">
            <img src="../IMAGE/Room.jpg" alt="Room Picture">
            <h3>FEEL LIKE HOME.</h3>
            <p>Chhaano Room Renting System</p>
        </div>
    <div class="success">
        </div>
        <div class="formbox">
            <h2>Log In</h2>
            <div class="inputbox">
                <form action="" name="myform" onsubmit="return validateform()" method="post">
                    <div class="error">
                        <?php
                        if (isset($_GET['error'])) {
                            echo "Username and Password Invalid!!";
                        }
                        ?>
                    </div>
                    <div class="success">
                        <?php
                        if (isset($_GET['message'])) {
                            echo "Password Changed Successfully!!";
                        }
                        ?>
                        <?php
                        if (isset($_GET['success'])) {
                            echo "Account Created Successfully!";
                        }
                        ?>
                        <?php
                       if (isset($_GET['welcome'])) {
                          echo "Hey,".$row['name'];
                        }
                     ?>
                    </div>
                    <div class="formdesign" id="email">
                        <input type="email" name="email" placeholder="Enter Email Address">
                        <p class="formerror"></p>
                    </div>
                    <div class="formdesign" id="pass">
                        <input type="password" name="psd" placeholder="Enter Password">
                        <p class="formerror"></p>
                    </div>
                    <div class="frg-btnn">
                        <a href="Forgot.php">Forgot Password?</a>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Log In" name="Login">
                    </div>
                    <div class="new-btnn">
                        <a href="signup.php">Don't Have an Account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
function seterror(id,error){
    var ele=document.getElementById(id);
    ele.getElementsByClassName("formerror")[0].innerHTML=error;

}
function clearerr(){
    errors=document.getElementsByClassName('formerror');
    for(let item of errors){
        item.innerHTML= "";
    }
}
    function validateform(){
        clearerr();
        var returnval=true;
        var email = document.forms['myform']['email'].value;
        var pass = document.forms['myform']['psd'].value;

       
        if(email== ""){
            seterror("email","*Required");
            returnval= false;
        }
        else{
            if(!/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email)){
          seterror("email","*Invalid Email");
          returnval=false;
        }
        }
        if(pass== ""){
            seterror("pass","*Required");
            returnval= false;
        }
        return returnval;
    }
</script>
</html>