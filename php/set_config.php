<?php
require_once('include/config/db.php');
require_once('include/result.php');

$result = new Result();

$account_id = mysqli_real_escape_string($dbc, trim(_POST['account_id']));
$passwd = mysqli_real_escape_string($dbc, trim(_POST['passwd']));
$repeat_passwd = mysqli_real_escape_string($dbc, trim(_POST['repeat_passwd']));
if(empty($account_id) || empty($passwd) || empty($repeat_passwd)
	|| $passwd == $repeat_passwd) {
	$result->errorcode = PARAM_ERROR;
	$result->description = 'param error';
	exit(NULL, $result);
}

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SELECT account_id from account WHERE account_id=$account_id";
$res = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($res);
if($row) {
	$result->errorcode = ACCOUNT_ID_REPEATED;
	$result->description = 'account id repeated';
	exit($dbc, $result);
}

$query = "INSERT INTO account (account_id, hashed_passwd) VALUES "
			. "($account_id, SHA($passwd))";
mysqli_query($dbc, $query);
$result->errorcode = OK;
exit($dbc, $result);
