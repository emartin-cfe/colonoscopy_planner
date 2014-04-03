<?php
	require 'connect.php';

	function log_access($patient_id, $page) {

		$query =	"INSERT INTO `patient_notification`.`Traffic` " .
					"(`patient_id`, `page_viewed`) " .
					"VALUES ('$patient_id', '$page')";

		$result = mysql_query($query);
		if (!$result) {
			return mysql_error();
			}
		else {
			return 1;
			}
		}

?>
