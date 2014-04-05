<?php
    require 'check_session.php';
    check_session();

	$clinic_id = $_SESSION['clinic_id'];

	$patient_id = $_POST['patient_id'];
	$patient_email = $_POST['patient_email'];
	$appointment_date = $_POST['appointment_date'];
	$bowel_prep = $_POST['bowel_prep'];
	$split_prep = $_POST['split_prep'];

	$SHA1 = sha1($patient_id);

	$query = 	"INSERT INTO Patient (patient_id, clinic_id, patient_email, SHA1, appointment_time, bowel_prep, single_or_split) " .
				"VALUES ('$patient_id', '$clinic_id', '$patient_email', '$SHA1', '$appointment_date', '$bowel_prep', '$split_prep')";

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$result = $mysqli->query($query);

	# Now generate a link
	$link = "http://24.87.64.193:10000/~emartin/patient_reminder/GUIDE/about_this_guide.php?auth=$SHA1";

	$to = $patient_email;
	$subject = "Re: colonoscopy appointment";

	$message = 	"<html><body><p></p></body></html>" .
				"<p>You have an appointment for a colonoscopy at $appointment_date at Pacific Gastroenterology Associates (770-1190 Hornby Street, Vancouver). " .
				"Please <a href='$link'>click this link</a> for more instructions" .
				"After reading the online instructions, please respond to this email if you have any additional concerns.</p>" .
				"</body></html>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";				# Needed for HTML mail
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	# Needed for HTML mail
	$headers .= 'From: Colonoscopy guide <reply_to@email.com>' . "\r\n";
	mail($to, $subject, $message, $headers);

	header('Location: display_patients.php')
?>
