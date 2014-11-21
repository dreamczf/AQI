<?php
define('AQI_OK', 0)
define('AQI_PARAM_ERROR', 1)
define('AQI_REPEAT_ACCOUNT_ID', 2)

class Result {
	public errorcode;
	public description;
}

function aqi_exit($dbc, $result) {
	if(!empty($dbc)) mysqli_close($dbc);

	echo json_encode($result);
	exit();
}
