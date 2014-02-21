<?php
	$host = "localhost";
	$user = "root";
	$password = "xtc036350858!";

	$link = mysql_connect($host, $user, $password);
	if (!$link) { die('Could not connect: ' . mysql_error()); }

	$db_selected = mysql_select_db('patient_notification', $link);
	if (!$db_selected) { die ('Can\'t use foo : ' . mysql_error()); }

	$email_to_add = $_GET['user'];
	$SHA1_hash = SHA1($email_to_add);

	$query = 	"INSERT INTO `patient_notification`.`Patient` " .
			"(`patient_id`, `email`, `SHA1_hash`) " .
			"VALUES (NULL, '$email_to_add', '$SHA1_hash')";

	$result = mysql_query($query);
	if (!$result) { die('Invalid query: ' . mysql_error()); }

	header('Location: http://127.0.0.1/~emartin/patient_reminder/display_patients.php');
	exit;
?>
