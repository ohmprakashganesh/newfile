<?php
session_start();
if (isset($_SESSION['uid'])) {
    $id = $_SESSION['uid'];
    include 'Conn.php';
    $sql = "SELECT * FROM rooms WHERE lid=$id";
    $result = $conn->query($sql);
    if($result){
        echo $id;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='../CSS/Registration.css'>
</head>
<body>
<div id="main-container">
    <fieldset>
    <legend>List of Room</legend>
    <div id="form-Box">
    <?php
if ($result->num_rows > 0) {
    echo '<table>';
    echo "<tr>";
    while ($row = $result->fetch_assoc()) {
        $rid = $row['roomno'];
        echo "<tr>";
        echo "<td colspan='3'><hr></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td width='80%'>" . " Room Type: ".$row['type']. " Location: ".$row['location']."</td>";
        echo "<td>" . "<a href='UpdateRoom.php?rid=" . $rid. "'><Button type='submit'>EDIT</Button></a></td>";
        echo "<td>" . "<Button type='submit' onclick='return deleteR(rid=" . $rid. ")'>DELETE</Button></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='3'><hr></td>";
       }
       echo "</tr>";
       echo "</table>";
     }
     else{
        echo "No rooms Registered by this landlord!";
        }
    ?>
    </div>
    </fieldset>
    </div>
    <div id="confirm">
        <p>hello</p>
    </div>
</body>
<script>
    function deleteR(id){
     document.getElementById('confirm').style.display='block';
    }
</script>
</html>

