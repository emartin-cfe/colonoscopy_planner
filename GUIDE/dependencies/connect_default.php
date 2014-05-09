<?php

	function connect_to_db() {
		$host = "";
		$user = "";
		$password = "";
		$database = "patient_notification";

		return new mysqli($host,$user,$password,$database);
		}

?>
