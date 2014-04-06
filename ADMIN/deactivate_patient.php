<?php
	require 'check_session.php';
	check_session();

	$clinic_id = $_SESSION['clinic_id'];
	$patient_id = $_GET['patient_id'];

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

	$query = 	"INSERT INTO Deleted_Patient " .
				"SELECT patient_id, clinic_id, patient_email, SHA1, appointment_time, bowel_prep, single_or_split, patient_entryDate, NOW() " .
				"FROM Patient WHERE clinic_id='$clinic_id' AND patient_id='$patient_id'";
	$result = $mysqli->query($query);

	$query = 	"DELETE FROM Patient WHERE clinic_id='$clinic_id' AND patient_id='$patient_id'";
	$result = $mysqli->query($query);

	header('Location: display_patients.php');
?>
