<?php
require_once('include/db.php');
require_once('include/result.php');

$result = new Result();
$result->errcode = AQI_DB_CONNECT_ERR;
$result->desc = 'db connect err';

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(json_encode($result));

if(isset($_GET['account_id']))
	$account_id = mysqli_real_escape_string($dbc, trim($_GET['account_id']));
if(isset($_GET['passwd']))
	$passwd = mysqli_real_escape_string($dbc, trim($_GET['passwd']));
if(empty($account_id) || empty($passwd)) {
	$result->errcode = AQI_PARAM_ERR;
	$result->desc = 'param err';
	aqi_exit($dbc, $result);
}

$result->errcode = AQI_DB_QUERY_ERR;
$result->desc = 'db query err';
$query = "SELECT id from account WHERE account_id='$account_id'"
		. " AND hashed_passwd=SHA('$passwd')";
$res = mysqli_query($dbc, $query) or die(json_encode($result));
$row = mysqli_fetch_array($res);
if(!$row) {
	$result->errcode = AQI_ACCOUNT_INFO_ERR;
	$result->desc = 'account info err';
	aqi_exit($dbc, $result);
}

$result->errcode = AQI_OK;
$result->desc = 'ok';
aqi_exit($dbc, $result);
