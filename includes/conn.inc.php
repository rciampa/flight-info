<?php

function createMySqlConn() {
	$db_user = 'ciam1324';
	$db_pass = '23c160875b24d7f';
	$db_dsn = 'mysql:host=localhost;dbname=ciam1324';
	$conn = new PDO($db_dsn, $db_user, $db_pass);
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}

?>
