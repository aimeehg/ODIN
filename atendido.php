<?php
include "connect.php";
if ($_POST['id']){

// Create connection
$conn = new mysqli($servidor, $usuario, $contra, $base);
$id=mysqli_real_escape_string($conn,$_POST['id']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql =  "DELETE FROM `seguimiento` WHERE id='$id'";

if ($conn->query($sql)) {
	return "holi";
  //  return json_encode("New record created successfully");
} else {
	echo "adioss";
   // return json_encode("Error: " . $sql . "<br>" . $conn->error);
}
$conn->close();
}
?>