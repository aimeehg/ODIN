<?php
include "connect.php";
$lat = floatval(number_format(floatval($_POST['lat_p']), 6, '.', ''));
$long = floatval(number_format(floatval($_POST['lon_p']), 6, '.', ''));

// Create connection
$conn = new mysqli($servidor, $usuario, $contra, $base);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO markers (lat, lng, type)
VALUES ('".$lat."','".$long."', 'bache')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>