<?php

require 'connect.php';
$mysqli = connect_to_db();
if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

$clinic_name = $_POST['clinic_name'];
$password_hash = sha1($_POST['password']);

$query = "SELECT clinic_id FROM Clinics WHERE clinic_name = '$clinic_name' AND clinicSHA1 = '$password_hash'";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
	$row = $result->fetch_array();
	session_start();
	$_SESSION['signed_in'] = 1;
	$_SESSION['clinic_id'] = $row['clinic_id'];
	header('Location: display_patients.php');
	}
else {
	header('Location: index.html');
	}

$result->close();
$mysqli->close();
?>
