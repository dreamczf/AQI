<?php
require_once('include/db.php');
require_once('include/result.php');

$result = new Result();
$result->errcode = AQI_DB_CONNECT_ERR;
$result->desc = 'db connect err';

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(json_encode($result));

if(isset($_GET['id']))
	$id = (int) mysqli_real_escape_string($dbc, trim($_GET['id']));
if(isset($_GET['repeat_day']))
	$repeat_day = (int) mysqli_real_escape_string($dbc, trim($_GET['repeat_day']));
if(isset($_GET['time']))
	$time = mysqli_real_escape_string($dbc, trim($_GET['time']));
if(empty($id) || empty($repeat_day) || empty($time)) {
	$result->errcode = AQI_PARAM_ERR;
	$result->desc = 'param err';
	aqi_exit($dbc, $result);
}

$result->errcode = AQI_DB_QUERY_ERR;
$result->desc = 'db query err';
$query = "UPDATE timer SET time='$time', repeat_day='$repeat_day' WHERE id='$id'";
mysqli_query($dbc, $query) or die(json_encode($result));

$result->errcode = AQI_OK;
$result->desc = 'ok';
aqi_exit($dbc, $result);
