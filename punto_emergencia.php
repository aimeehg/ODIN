<?php
require("connect.php");
// Opens a connection to a MySQL server.
$mysqli = new mysqli($servidor, $usuario, $contra, $base);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
///$peticion = $mysqli->query("SELECT lat,lng,id FROM seguimiento ORDER BY hora DESC LIMIT 1");
$peticion = $mysqli->query("select id, lat ,lng ,hora, max(hora)from seguimiento");

$coord = array();
while ($row = mysqli_fetch_assoc($peticion)){
	//echo "document.getElementById('output').innerHTML = 'whatever';";
  	//echo $row['lat'];
  	//echo  $row['hora'];
  	echo $coord[] = json_encode(array($row));
}

?>