<?php
	require 'connect.php';

	function log_access($sha1, $page) {

		$query =	"INSERT INTO `patient_notification`.`Traffic` " .
					"(`SHA1`, `page_viewed`) " .
					"VALUES ('$sha1', '$page')";

		$result = mysql_query($query);
		if (!$result) {
			return mysql_error();
			}
		else {
			return 1;
			}
		}

	function modulate_links($page_to_log, $lookups, $sha1) {
		log_access($sha1, $page_to_log);
		$lookups['previous_page'] = $lookups['previous_page'] . "?auth=$sha1";
		$lookups['next_page'] = $lookups['next_page'] . "?auth=$sha1";
		return $lookups;
		}

	function modulate_question_links($page_to_log, $lookups, $sha1) {
		log_access($sha1, $page_to_log);
		$lookups['next_page_yes'] = $lookups['next_page_yes'] . "?auth=$sha1";
		$lookups['next_page_no'] = $lookups['next_page_no'] . "?auth=$sha1";
		$lookups['previous_page'] = $lookups['previous_page'] . "auth=$sha1";
		return $lookups;
		} 

?>
