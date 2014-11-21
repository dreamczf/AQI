<?php
require_once('include/config/db.php');
require_once('include/result.php');

$result = new Result();

$account_id = mysqli_real_escape_string($dbc, trim(_POST['account_id']));
$passwd = mysqli_real_escape_string($dbc, trim(_POST['passwd']));
if(empty($account_id) || empty($passwd)) {
	$result->errorcode = PARAM_ERROR;
	$result->description = 'param error';
	aqi_exit(NULL, $result);
}

$dbc = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SELECT hased_passwd from aqi_account WHERE account_id=$account_id";
$res = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($res);
if(!$row) {
	$result->errorcode = ACCOUNT_INFO_ERROR;
	$result->description = 'account info error';
	aqi_exit($dbc, $result);
}

if(hash($passwd) != $row['hashed_passwd']) {
	$result->errorcode = ACCOUNT_INFO_ERROR;
	$result->description = 'account info error';
	aqi_exit($dbc, $result);
}

$result->errorcode = OK;
aqi_exit($dbc, $result);
