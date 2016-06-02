<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
require("connect.php");
$connect = mysqli_connect($servidor, $usuario, $contra,$base) or die("Unable to Connect to '$servidor'");
mysqli_select_db($connect,$base) or die("Could not open the db '$base'");

$test_query = "SHOW TABLES FROM $base";

$result = mysqli_query($connection, $test_query);

$tblCnt = 0;

while($tbl = mysql_fetch_array($result)) {
  $tblCnt++;
  echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}