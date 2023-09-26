<?php
session_start();
if(isset($_GET['rid'])) {
    include 'Conn.php';
    $roomno = $_GET['rid'];
   // echo $roomno;
    $sql = "SELECT * FROM rooms WHERE roomno= '$roomno'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (isset($_POST['submit']) && isset($_FILES['image'])) {
        $type = trim($_POST['type']);
        $price = trim($_POST['price']);
        $location = trim($_POST['location']);
        $description = trim($_POST['description']);

        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image = mysqli_real_escape_string($conn, $image);
        $sql2="update rooms set price='$price', type='$type', location='$location', description='$description',image='$image' where roomno='$roomno'";
        $conn->query($sql2);
        header("Location: SuccessPage.php");

    }
}
else{
    header("Location:LandlordLogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=f, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='../CSS/Registration.css'>
</head>
<body>
    <div id="main-container">
        <fieldset>
            <legend>Room Details</legend>
            <div id="form-Box">
                <table>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div id="error2" class="error">
                             <?php
                            if (isset($_GET['error'])) {
                                echo "Landlord not registered yet.";
                            }
                             ?>
                        </div>
                        <tr>
                            <div id="input-type" class="input-data">
                                <td>
                                    <select name="type" id="type">
                                        <option value="SELECT">Select Type</option>
                                        <option value="SINGLE">Single</option>
                                        <option value="SHARED">Shared</option>
                                        <option value="TRIPLE">Triple</option>
                                        <option value="FAMILY">Family</option>
                                        <option value="FLAT">Flat</option>
                                    </select>
                                </td>
                            </div>
                            <div id="input-price" class="input-data">
                                <td><input type="text" name="price" id="price"placeholder="Price per Month" value='<?php echo $row['price']; ?>'></td>
                            </div>
                        </tr>
                        <tr>
                            <div id="input-location" class="input-data">
                                <td><input type="text" name="location" id="location" placeholder="Location"value='<?php echo $row['location']; ?>'></td>
                            </div>
                            <div id="input-image" class="input-data">
                                <td><input type="file" name="image" id="image"></td>
                            </div>
                        </tr>
                        <tr>
                            <div id="input-description" class="input-data">
                                <td colspan="2" align="center"><textarea name="description" id="description" cols="90" rows="10"><?php echo $row['description']; ?></textarea></td>
                            </div>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><button type="submit" name='submit' onclick="return regValidation()">UPDATE</button></td>
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
  var type = document.getElementById('type');
  var price = document.getElementById('price');
  var location = document.getElementById('location');
  var description = document.getElementById('description');
  var picture = document.getElementById('image');
  var error2 = document.getElementById('error2');
  error2.innerHTML = '';
  if (location.value.trim() === '') {
    error2.innerHTML = 'Please enter the Location';
    location.focus();
    return false;
  }
  if (!/^[A-Za-z\s\-'.,]{2,}$/.test(location.value.trim())) {
    error2.innerHTML = 'Please enter a valid Location';
    location.focus();
    return false;
  }
  if (location.value.trim().length > 20) {
    error2.innerHTML = 'Location Limit(20) Exceeded';
    location.focus();
    return false;
  }

  if (price.value.trim() === '') {
    error2.innerHTML = 'Please enter the Price';
    price.focus();
    return false;
  }

  if (type.value === 'select') {
    error2.innerHTML = 'Please select the Type of Room';
    return false;
  }
  var allowedExtensions = ['.jpg', '.jpeg', '.png'];
  var fileExtension = picture.value.substring(picture.value.lastIndexOf('.')).toLowerCase();
  var maxSizeInBytes = 40*1024*1024;
  if (picture.value.trim() === '') {
  error2.innerHTML = 'Please insert a picture';
  return false;
}
else{
    var fileSizeInBytes = picture.files[0].size;
}
if (!allowedExtensions.includes(fileExtension)) {
  error2.innerHTML = 'Picture Format ' + allowedExtensions.join(', ') + ' required';
  return false;
}
if (fileSizeInBytes > maxSizeInBytes) {
  error2.innerHTML = 'File size exceeds the maximum limit of 40MiB.';
  return false;
}
if (description.value.trim().length <10|| description.value.trim().length >300) {
    error2.innerHTML = 'Please select the description of Room within(10-300) Characters';
    return false;
  }

    return true;
}  
</script>
</html>
