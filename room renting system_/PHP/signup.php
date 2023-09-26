<?php
session_start();
if (isset($_POST['Register'])) {
  
    include 'Conn.php';
    $email = $_POST['email'];
    $name = $_POST['name'];
    $psd = $_POST['psd'];
    $cpsd = $_POST['cpsd'];
    //$hashedPsd = password_hash($psd, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($email == $row['email']) {
      header("Location: login.php?err=1");
    } else {
        $sql = "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$psd')";
        $sql2 = "INSERT INTO landlord (lname, lemail, lpassword) VALUES ('$name', '$email', '$psd')";
        mysqli_query($conn,$sql2);

        if ($conn->query($sql) === true) {
          header("Location:Welcome.php?email=$email");
        }
    }
}
?>
<!DOCTYPE html>
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
        <div class="formbox">
            <h2>Sign Up</h2>
        <div class="inputbox">
                    <div class="error">
            <?php
            if(isset($_GET['err'])){
                echo "Email Already Exists";
            }
            ?>
        <form name="myform" onsubmit="return validateform()" method="post">
        </div>
        <div class="formdesign" id="name">
         <input type="text" name="username" placeholder="Full Name">
         <p class="formerror"  ></p> 
        </div>
        <div class="formdesign" id="email">
            <input type="text" name="email" placeholder="Email Address">
            <p class="formerror"  ></p> 
           </div>
           <div class="formdesign" id="pass">
            <input type="password" name="psd" placeholder="Password">
             <p class="formerror"  ></p> 
           </div>
           <div class="formdesign" id="cpass">
            <input type="password" name="cpsd" placeholder="Confirm Password">
             <p class="formerror"></p> 
           </div>
           <div class="btn">
             <input type="submit" class="btn" value="Submit" name="Register">
        </div>
        <div class="new-btnn">
            <a href="login.php">Already have an Account?<a>
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
        console.log('clicked');
        var returnval=true;
        clearerr();
        var name = document.forms['myform']['username'].value.trim();
        var email = document.forms['myform']['email'].value.trim();
        var pass = document.forms['myform']['psd'].value.trim();
        var cpass = document.forms['myform']['cpsd'].value.trim();

        if(name== ""){
            seterror("name","*Required");
            returnval= false;
        }else{
            if(name.length>30){
            seterror("name","Limit(30) Exceeded")
            returnval=false;
            }
           if (!/^[A-Za-z\s.'-]+$/.test(name)) {
           seterror("name","*Invalid Name")
           returnval= false;
        }
        }
       
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
        else{
        if(pass.length <8){
            seterror("pass","*Required Length(8)");
            returnval= false;
        }
       }
        if(cpass== ""){
            seterror("cpass","*Required");
            returnval=false;
        }else{
            if(cpass != pass){
                seterror("cpass","Passward Not Matched");
                returnval=false;
            }
        } 
        return returnval;
    }
</script>
</html>