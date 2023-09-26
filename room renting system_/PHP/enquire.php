<?php
if(isset($_GET['id'])){
    $roomno=$_GET['id'];
    include 'Conn.php';
    $sql = "select * from rooms, landlord where landlord.lid=rooms.lid and roomno=$roomno";
    echo $sql;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/enqbook.css">
    <link rel="stylesheet" href="../CSS/nextcard.css">
</head>

<body>
    <div class="top">
        <p>
            <img src="../IMAGE/logo_transparent.png" alt="">
        </p>
        <nav>
            <ul>
                <li> <a href="#">Home</a></li>
                <li> <a href="#">Rooms</a></li>
                <li> <a href="#">Contact</a></li>
                <li> <a class="menu" href="#">Menu</a></li>
            </ul>
        </nav>
        <p>
            <a href="#"><button class="abtn">Log In</button> </a>
        </p>
    </div>

    <div id="header">
        <div id="leftheader">
            <div id="econtainer">
                <div class="eimg"> <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" >'; ?></div>
                <div id="edetails">
                <p><?php echo $row['description'];?></p>
                   <button id="readmore">Readmore</button>
                </div>

                <div class="emain">
                    <div class="ebox">
                        <div class="eroom">
                            <table>
                                <tr>
                                    <th colspan="2">
                                        <h4>Room Details</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <td class="name">Type:</td>
                                    <td class="value">
                                    <?php echo $row['type'];?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">Location:</td>
                                    <td class="value">
                                    <p> <?php echo $row['location'];?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">Price:</td>
                                    <td class="value">
                                    <p> <?php echo $row['price'];?> </p>
                                    </td>
                                </tr>

                            </table>
                        </div>


                        <div class="eowner">
                            <table>
                            <tr>
                                <th colspan="2">
                                <h5>Owner Details</h5>
                                </th>
                            </tr>
                            <tr>
                                <td class="name">Email</td>
                                <td class="value"><p><?php echo $row['lemail'];?> </p></td>
                            </tr>
                            <tr>
                                <td class="name">Address</td>
                                <td class="value"><p><?php echo $row['laddress'];?> </p></td>
                            </tr>
                            <tr>
                                <td class="name">Phone</td>
                                <td class="value"><p><?php echo $row['lphone'];?></p><tr> 
                            </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div id="rightheader">
            <div id="bcontainer">
                <div id="bformbox">
                    <h4><span></span>
                        <p>Input your details </p>
                    </h4>

                    <form action="om.php" name="myform" onsubmit="return validateform()" method="post">
                        <div class="formdesign" id="name">
                            <input type="text" name="username" placeholder="Enter your name">
                            <p class="formerror"></p>
                        </div>
                        <div class="formdesign" id="email">
                            <input type="text" name="femail" placeholder="Enter Email Address">
                            <p class="formerror"></p>
                        </div>
                        <div class="formdesign" id="phone">
                            <input type="text" name="fphone" placeholder="Enter phone number">
                            <p class="formerror"></p>
                        </div>
                        <div class="formdesign" id="address">
                            <input type="text" name="faddress" placeholder="Enter address">
                            <p class="formerror"></p>
                        </div>
                        <div class="btn">
                            <div><input type="submit" class="btnn" value="Book "></div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    

</body>
<script>



    function seterror(id, error) {
 document.querySelector('.bcontainer').classList.add('show');
        ele.getElementsByClassName("formerror")[0].innerHTML = error;

    }
    function clearerr() {
        errors = document.getElementsByClassName('formerror');
        for (let item of errors) {
            item.innerHTML = "";

        }
    }

    function validateform() {

        var returnval = true;
        clearerr();
        var name = document.forms['myform']['username'].value;
        var email = document.forms['myform']['femail'].value;
        var phone = document.forms['myform']['fphone'].value;
        var address=document.forms['myform']['faddress'].value;
       

        if (name == "") {

            seterror("name", "please enter name");
            returnval = false;
        }
        if (name.length > 50) {
            seterror("name", "exceeds the lenght ")
        }
        if (email == "") {
            seterror("email", "please input emial");
            returnval = false;
        }

        if (phone.length == "") {
            seterror("phone", "please fill it");
            returnval = false;
        } else {
            if (phone.length != 10) {
                seterror("phone", "enter 10 digit only");
                returnval = false;
            }
        }

      if(address.length ==""){
        seterror("address","flease fill address");
        returnval=false;
      }else{
        if(address.length<5){
            seterror("phone","enter full address");
            returnval=false;
        }
      }

   
        return returnval;


    }
</script>

</html>