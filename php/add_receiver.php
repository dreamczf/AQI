<?php
require_once('include/db.php');
require_once('include/result.php');

$result = new Result();
$result->errcode = AQI_DB_CONNECT_ERR;
$result->desc = 'db connect err';

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(json_encode($result));

if(isset($_GET['account_id']))
	$account_id = (int) mysqli_real_escape_string($dbc, trim($_GET['account_id']));
if(isset($_GET['receiver_type_id']))
	$receiver_type_id = (int) mysqli_real_escape_string($dbc, trim($_GET['receiver_type_id']));
if(isset($_GET['receiver']))
	$receiver = mysqli_real_escape_string($dbc, trim($_GET['receiver']));
if(empty($account_id) || empty($receiver_type_id) || empty($receiver)) {
	$result->errcode = AQI_PARAM_ERR;
	$result->desc = 'param err';
	aqi_exit($dbc, $result);
}

$result->errcode = AQI_DB_QUERY_ERR;
$result->desc = 'db query err';
$query = "INSERT INTO receiver (receiver_type_id, receiver, account_id) "
		. "VALUES('$receiver_type_id', '$receiver', '$account_id')";
mysqli_query($dbc, $query) or die(json_encode($result));

$result->errcode = AQI_OK;
$result->desc = 'ok';
aqi_exit($dbc, $result);
