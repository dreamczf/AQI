<?php
require_once('include/config/db.php');
require_once('include/result.php');

$result = new Result();
$receivers = array();

$dbc = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT id, type, enabled from receiver_type";
$res = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($res)) {
	receivers[] = $row;
}

if(count($receivers) == 0) {
	$result->errorcode = AQI_NO_CONTACT_TYPE;
	$result->descriptioin = "no receiver type";
	exit($dbc, $result);
}

echo json_encode($receivers);
exit();
