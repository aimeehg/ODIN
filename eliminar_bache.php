<?php
include "connect.php";
$id = intval($_GET["id"]);

// Create connection
$conn = new mysqli($servidor, $usuario, $contra, $base);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM markers where id=".$_POST['id'];

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>