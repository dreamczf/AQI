<?php
define('AQI_OK', 0);
define('AQI_DB_CONNECT_ERR', 1);
define('AQI_DB_QUERY_ERR', 2);
define('AQI_PARAM_ERR', 3);
define('AQI_ACCOUNT_ID_REPEATED', 4);
define('AQI_ACCOUNT_INFO_ERR', 5);
define('AQI_NO_CONTACT_TYPE', 6);
define('AQI_NO_SUCH_ID', 7);

class Result {
	public $errcode;
	public $desc;
}

function aqi_exit($dbc, $result) {
	if(!empty($dbc)) mysqli_close($dbc);

	echo json_encode($result);
	exit();
}
