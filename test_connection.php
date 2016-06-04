
<?php
/** 
<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
require("connect.php");
$connect = mysqli_connect($servidor, $usuario, $contra,$base) or die("Unable to Connect to '$servidor'");
mysqli_select_db($connect,$base) or die("Could not open the db '$base'");

$test_query = "SHOW TABLES FROM $base";

$result = mysqli_query($connection, $test_query);

$tblCnt = 0;

while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}
	*/
	
function connect()
{
	// DB connection info
	$host = "us-cdbr-azure-southcentral-e.cloudapp.net";
	$user = "b626e05c4e4c27";
	$pwd = "d7af55f9";
	$db = "odin_bd";
	try{
		$conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        console.log(getAllItems());
	}
	catch(Exception $e){
		die(print_r($e));
	}
	return $conn;
}

function getAllItems()
{
	$conn = connect();
	$sql = "SELECT * FROM markers";
	$stmt = $conn->query($sql);
	return $stmt->fetchAll(PDO::FETCH_NUM);
}

function addItem($info, $lat, $lng,)
{
	$conn = connect();
	$sql = "INSERT INTO markers (info, lat, lng) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $info);
	$stmt->bindValue(2, $lat);
	$stmt->bindValue(3, $lng);
	$stmt->execute();
}

function deleteItem($item_id)
{
	$conn = connect();
	$sql = "DELETE FROM markers WHERE id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $item_id);
	$stmt->execute();
}

?>