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
if(isset($_GET['repeat_passwd']))
	$repeat_passwd = mysqli_real_escape_string($dbc, trim($_GET['repeat_passwd']));
if(empty($account_id) || empty($passwd) || empty($repeat_passwd)
	|| $passwd != $repeat_passwd) {
	$result->errcode = AQI_PARAM_ERR;
	$result->desc = 'param err';
	aqi_exit(NULL, $result);
}

$result->errcode = AQI_DB_QUERY_ERR;
$result->desc = 'db query err';
$query = "SELECT account_id from account WHERE account_id='$account_id'";
$res = mysqli_query($dbc, $query) or die(json_encode($result));
$row = mysqli_fetch_array($res);
if($row) {
	$result->errcode = AQI_ACCOUNT_ID_REPEATED;
	$result->desc = 'account id repeated';
	aqi_exit($dbc, $result);
}

$query = "INSERT INTO account (account_id, hashed_passwd) "
			. "VALUES('$account_id', SHA($passwd))";
mysqli_query($dbc, $query);
$result->errcode = AQI_OK;
$result->desc = 'ok';
aqi_exit($dbc, $result);
