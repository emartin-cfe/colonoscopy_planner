<?php
    session_start();
    if (!$_SESSION['signed_in']) {
        header("Location: index.html");
        exit;
        }
?>


<?php

require 'connect.php';
$mysqli = connect_to_db();
if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

$clinic_id = $_SESSION['clinic_id'];

$query = "SELECT patient_id, email FROM Clinics NATURAL JOIN Patient";
$result = $mysqli->query($query);

while ($row = $result->fetch_array()) {
	print $row['email'];
	}

$result->close();
$mysqli->close();


?>
