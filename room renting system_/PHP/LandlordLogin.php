<?php
session_start(); 
if (isset($_POST['Login'])) {
    include 'Conn.php';
    $email = $_POST['email'];
    $psd = $_POST['psd'];
    $sql = "SELECT * FROM landlord WHERE lemail='$email' AND lpassword='$psd'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            $_SESSION['status'] = 1;
            $_SESSION['uid'] = $row['lid'];
            header("Location: ListRoom.php");
        } else {
          header("Location: LandlordLogin.php?error=1");
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Registration.css">
</head>
<body>
<div id="main-container">
        <fieldset>
            <legend>Login</legend>
            <div id="form-Box">
                <table>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div id="error2" class="error">
                            <?php
                            if (isset($_GET['error'])) {
                                echo "Email Adress and Password not Matched.";
                            }
                            ?>
                        </div>
                        <tr>
                            <div id="input-email" class="input-data">
                                <td><input type="email" name="email" id="email" placeholder="Email Address"></td>
                            </div>
                            <div id="input-password" class="input-data">
                                <td><input type="password" name="psd" id="password" placeholder="Password"></td>
                            </div>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><button type="submit" name='Login' onclick="return regValidation()">Login</button></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="AddLandlord.php">Not Registered a Landlord yet?</a></td>
                        </tr> 
                    </form>
                </table>
            </div>
        </fieldset>
    </div>
</body>
<script>
function regValidation() {
    let email = document.getElementById('email');
    let psd = document.getElementById('password');
    let error1 = document.getElementById('error2');
    error1.innerHTML = '';
  if (email.value.trim() === '') {
    error1.innerHTML = 'Please enter your Email Address';
    email.focus();
    return false;
  }
  else{
    if(!/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email.value)){
    error1.innerHTML = 'Invalid Email';
    email.focus();
    return false;
  }
}
if(psd.value==''){
    error1.innerHTML = 'Please enter your Password';
    psd.focus();
    return false;
  }
  return true;
}  
</script>
</html>