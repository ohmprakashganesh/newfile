<?php
session_start();
include 'Conn.php';
$error='';

$sql = 'select * from rooms';
$result = $conn->query($sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['login'])) {
    include 'Conn.php';
    $email = $_POST['email1'];
    $psd = $_POST['psd1'];
    $sql = "SELECT * FROM login WHERE email='$email' AND password='$psd'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = 1;
        $_SESSION['uid'] = $row['id'];
        header("Location: AddRoom.php");
    } else {
        header("Location: DashBoards.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/nextcard.css">
   
</head>
<body>
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
                <li> <a  class="menu" href="#">Menu</a></li>
             </ul>
            </nav>
            <p>
            <a href="login.php"><button class="abtn" name='Login'>Login In</button>  </a>
            </p>
        </div>
        <div class="disp">
            <img src="../IMAGE/logo_transparent.png" alt="">
          </div>
          <form action="Search.php" method='post'>
          <div class="search">
            <p>
                FIND THE ROOM 
            </p>
            <p>TYPE  <select name="type" id="type">
            <option value="SELECT">SELECT</option>
            <option value="SINGLE">Single</option>
            <option value="SHARED">Shared</option>
            <option value="TRIPLE">Triple</option>
            <option value="FAMILY">Family</option>
            <option value="FLAT">Flat</option>
            </select> 
          </p>
            <p>PRICE  <select name="price" id="price">
                <option value="Price">Range</option>
                <option value="Below 1000">Below RS1000</option>
                <option value="1000">RS 1000</option>
                <option value="2000">RS 2000</option>
                <option value="3000">RS 3000</option>
                <option value="4000">RS 4000</option>
                <option value="5000">RS 5000</option>
                <option value="6000">RS 6000</option>
                <option value="7000">RS 7000</option>
                <option value="8000">RS 8000</option>
                <option value="9000">RS 9000</option>
                <option value="10000">RS 10000</option>
                <option value="Above 10000">Above RS10000</option>
                </select>
             </p>
            <p>LOCATION
                <input type='text' name='location'>
          </p>
          <p>
              <input type="submit" value="Explore Rooms" name="search">
        </div>
    </form>
        <table>
            <tr>
             <td>
             <div class="container">
                <div class="one">
                    <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['0']['image']) . '" >'; ?>
                    </div>
                    <div class="detail">
                        <p class="title"><?php echo $row['0']['type'] . " ROOM <br>"; ?></p>
                        <p class="dtl"><?php echo $row['0']['description'] . "<br>"; ?></p>
                        <p class="price"><?php echo 'RS '.$row['0']['price'] . "<br>"; ?></p>
                    </div>
                    <div class="btn">
                        <a href="enquire.php?id=1"> <button class="child_btn">Enquire</button></a>
                        <a href="LoginT.php?id=1"><button class="child_btn">Book</button></a>
                    </div>
                    </div>
                        <div class="one">
                            <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['1']['image']) . '" >'; ?>
                            </div>
                            <div class="detail">
                            <p class="title"><?php echo $row['1']['type'] . " ROOM <br>"; ?></p>
                            <p class="dtl"><?php echo $row['1']['description'] . "<br>"; ?></p>
                            <p class="price"><?php echo 'RS '.$row['1']['price'] . "<br>"; ?></p>
                            </div>
                            <div class="btn">
                               <a href="enquire.php?id=2"><button class="child_btn">Enquire</button></a> 
                               <a href="LoginT.php?id=2"> <button class="child_btn">Book</button></a> 
                            </div>
                        </div>
                       <div class="one">
                        <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['2']['image']) . '" >'; ?>
                        </div>
                        <div class="detail">
                        <p class="title"><?php echo $row['2']['type'] . " ROOM <br>"; ?></p>
                        <p class="dtl"><?php echo $row['2']['description'] . "<br>"; ?></p>
                        <p class="price"><?php echo 'RS '.$row['2']['price'] . "<br>"; ?></p>
                        </div>
                        <div class="btn">
                            <a href="enquire.php?id=3"> <button class="child_btn">Enquire</button></a>
                            <a href="LoginT.php?id=3"> <button class="child_btn">Book</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
            </tr>
            <tr>
                <div class="container">
                    <div class="one">
                        <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['3']['image']) . '" >'; ?>
                        </div>
                        <div class="detail">
                            <p class="title"><?php echo $row['3']['type'] . " ROOM <br>"; ?></p>
                            <p class="dtl"><?php echo $row['3']['description'] . "<br>"; ?></p>
                            <p class="price"><?php echo 'RS '.$row['3']['price'] . "<br>"; ?></p>
                        </div>
                        <div class="btn">
                            <a href="enquire.php?id=4"> <button class="child_btn">Enquire</button></a>
                            <a href="LoginT.php?id=4"> <button class="child_btn">Book</button></a>
                        </div>
                    </div>
                            <div class="one">
                                <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['4']['image']) . '" >'; ?>
                                </div>
                                <div class="detail">
                                <p class="title"><?php echo $row['4']['type'] . " ROOM <br>"; ?></p>
                                <p class="dtl"><?php echo $row['4']['description'] . "<br>"; ?></p>
                                <p class="price"><?php echo 'RS '.$row['4']['price'] . "<br>"; ?></p>
                                </div>
                                <div class="btn">
                                    <a href="enquire.php?id=5"><button class="child_btn">Enquire</button></a>
                                    <a href="LoginT.php?id=5"><button class="child_btn">Book</button></a>
                                </div>
                            </div>
                           <div class="one">
                            <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['5']['image']) . '" >'; ?>
                            </div>
                            <div class="detail">
                            <p class="title"><?php echo $row['5']['type'] . " ROOM <br>"; ?></p>
                            <p class="dtl"><?php echo $row['5']['description'] . "<br>"; ?></p>
                            <p class="price"><?php echo 'RS '.$row['5']['price'] . "<br>"; ?></p>
                            </div>
                            <div class="btn">
                                <a href="enquire.php?id=6"><button class="child_btn">Enquire</button></a>
                                 <a href="LoginT.php?id=6"><button class="child_btn">Book</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
                </tr>
    
                <tr>
                    <div class="container">
                        <div class="one">
                            <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['6']['image']) . '" >'; ?>
                            </div>
                            <div class="detail">
                            <p class="title"><?php echo $row['6']['type'] . " ROOM <br>"; ?></p>
                            <p class="dtl"><?php echo $row['6']['description'] . "<br>"; ?></p>
                            <p class="price"><?php echo 'RS '.$row['6']['price'] . "<br>"; ?></p>
                            </div>
                            <div class="btn">
                                <a href="enquire.php?id=7"> <button class="child_btn">Enquire</button></a>
                                <a href="LoginT.php?id=7"><button class="child_btn">Book</button></a>
                            </div>
                        </div>
                                <div class="one">
                                    <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['7']['image']) . '" >'; ?>
                                    </div>
                                    <div class="detail">
                                    <p class="title"><?php echo $row['7']['type'] . " ROOM <br>"; ?></p>
                                    <p class="dtl"><?php echo $row['7']['description'] . "<br>"; ?></p>
                                    <p class="price"><?php echo 'RS '.$row['7']['price'] . "<br>"; ?></p>
                                    </div>
                                    <div class="btn">
                                        <a href="enquire.php?id=8"> <button class="child_btn">Enquire</button></a>
                                        <a href="LoginT.php?id=8"> <button class="child_btn">Book</button></a>
                                    </div>
                                </div>
                               <div class="one">
                                <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['8']['image']) . '" >'; ?>
                                </div>
                                <div class="detail">
                                <p class="title"><?php echo $row['8']['type'] . " ROOM <br>"; ?></p>
                                <p class="dtl"><?php echo $row['8']['description'] . "<br>"; ?></p>
                                <p class="price"><?php echo 'RS '.$row['8']['price'] . "<br>"; ?></p>
                                </div>
                                <div class="btn">
                                    <a href="enquire.php?id=9"><button class="child_btn">Enquire</button></a>
                                    <a href="LoginT.php?id=9"><button class="child_btn">Book</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                    </tr>
                    <tr>
                        <div class="container">
                            <div class="one">
                                <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['9']['image']) . '" >'; ?>
                                </div>
                                <div class="detail">
                                <p class="title"><?php echo $row['9']['type'] . " ROOM <br>"; ?></p>
                                <p class="dtl"><?php echo $row['9']['description'] . "<br>"; ?></p>
                                <p class="price"><?php echo 'RS '.$row['9']['price'] . "<br>"; ?></p>
                                </div>
                                <div class="btn">
                                    <a href="enquire.php?id=10"><button class="child_btn">Enquire</button></a>
                                    <a href="LoginT.php?id=10"><button class="child_btn">Book</button></a>
                                </div>
                            </div>
                                    <div class="one">
                                        <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['10']['image']) . '" >'; ?>
                                        </div>
                                        <div class="detail">
                                        <p class="title"><?php echo $row['10']['type'] . " ROOM <br>"; ?></p>
                                        <p class="dtl"><?php echo $row['10']['description'] . "<br>"; ?></p>
                                        <p class="price"><?php echo 'RS '.$row['10']['price'] . "<br>"; ?></p>
                                        </div>
                                        <div class="btn">
                                            <a href="enquire.php?id=11"><button class="child_btn">Enquire</button></a>
                                            <a href="LoginT.php?id=11"><button class="child_btn">Book</button></a>
                                        </div>
                                    </div>
                                   <div class="one">
                                    <div class="img"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['11']['image']) . '" >'; ?>
                                    </div>
                                    <div class="detail">
                                        <p class="title">room type</p>
                                        <p class="title"><?php echo $row['11']['type'] . " ROOM <br>"; ?></p>
                                        <p class="dtl"><?php echo $row['11']['description'] . "<br>"; ?></p>
                                        <p class="price"><?php echo 'RS '.$row['11']['price'] . "<br>"; ?></p>
                                    </div>
                                    <div class="btn">
                                        <a href="enquire.php?id=12"><button class="child_btn">Enquire</button></a>
                                        <a href="LoginT.php?id=12"><button class="child_btn">Book</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                        </tr>
                        
                   </table> 
</body>
</html>