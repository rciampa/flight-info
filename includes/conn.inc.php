<?php

function createMySqlConn() {
	$db_user = '';
	$db_pass = '';
	$db_dsn = 'mysql:host=localhost;dbname=';
	$conn = new PDO($db_dsn, $db_user, $db_pass);

	return $conn;
}

?>
