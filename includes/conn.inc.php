<?php

function createMySqlConn() {
	$db_user = '';
	$db_pass = '';
	$db_dsn = 'mysql:host=localhost;dbname=';
	$conn = new PDO($db_dsn, $db_user, $db_pass);
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}

?>
