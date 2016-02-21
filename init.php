<?php

	require 'config.php';
	require 'functions.php';

	$conn = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port);

	if ($conn->connect_error) {
		die('Connection failed: ' . $conn->connect_error);
	}

?>