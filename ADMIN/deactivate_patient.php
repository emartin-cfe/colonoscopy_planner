<?php
	require 'check_session.php';
	check_session();

	$clinic_id = $_SESSION['clinic_id'];
	$patient_id = $_GET['patient_id'];

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

	$query = 	"UPDATE Patient " .
				"SET patient_status = 'inactive' " .
				"WHERE clinic_id='$clinic_id' AND patient_id = '$patient_id'";
	$result = $mysqli->query($query);

	header('Location: display_patients.php');
?>
