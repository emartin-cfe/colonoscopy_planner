<?php
    require 'check_session.php';
    check_session();

	$clinic_id = $_SESSION['clinic_id'];

	$patient_id = $_POST['patient_id'];
	$patient_email = $_POST['patient_email'];
	$appointment_date = $_POST['appointment_date'];
	$bowel_prep = $_POST['bowel_prep'];
	$split_prep = $_POST['split_prep'];

	$query = 	"UPDATE Patient " .
				"SET patient_email='$patient_email', appointment_time='$appointment_date', bowel_prep='$bowel_prep', single_or_split='$split_prep'" .
				"WHERE clinic_id = '$clinic_id' AND patient_id = '$patient_id'";

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$result = $mysqli->query($query);

	header('Location: display_patients.php')
?>
