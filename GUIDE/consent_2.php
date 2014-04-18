<?php

	$sha1 = $_GET['auth'];
	$initials = $_POST['initials'];

	$query = 	"UPDATE Patient SET consent_initials = '$initials', consent_date = NOW() WHERE SHA1 = '$sha1'";

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

	$result = $mysqli->query($query);

	header("Location: about_this_guide.php?auth=$sha1")
?>
