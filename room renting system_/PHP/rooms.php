<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/final.css">
</head>

<body>
    <div class="top">
        <p>
            <img src="../IMAGE/logo_transparent.png" alt="">
        </p>
        <nav>
         <ul>
            <li> <a href="home1.php">Home</a></li>
            <li> <a href="rooms.php">Rooms</a></li>
            <li> <a href="contact.php">Contact</a></li>
         </ul>
        </nav>
        <p>
        <a href="login.php"><button class="abtn" name='Login'>+ ADD</button>  </a>
         <a href="signup.php"><button class="abtn" name='Login'>Log In</button>  </a>
        </p>
    </div>
    <div class="disp">
        <img src="../IMAGE/logo_transparent.png" alt="">
      </div>
      <form action="Search.php" method='post'>

<!-- search section begins from here  -->

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

      <?php
include 'conn.php';
$query = "SELECT * FROM rooms";
$data = mysqli_query($conn, $query);
?>
<div class="container">
    <?php 

if ($data) {
    while ($temp = mysqli_fetch_assoc($data)) {
        ?>
            <div class="box">
                <div class="img">
                <?php if (!empty($temp['image'])): ?>
                    <img src="<?php  echo $temp['image']; ?> ">
                    <?php endif; ?>
                </div>
                <div class="detail">
                    <?php if (!empty($temp['type'])): ?>
                        <p class="title"><?php echo $temp['type']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($temp['price'])): ?>
                        <p class="price">price: Rs <?php echo $temp['price']; ?></p>
                    <?php endif; ?>
                    <div class="btn">
                        <a href="enquire.html"><button>Enquire</button></a>
                        <a href="new.html"><button>Book</button></a>
                    </div>
                </div>
            </div>

        <?php
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
?>
 </div>


    
</body>
</html>