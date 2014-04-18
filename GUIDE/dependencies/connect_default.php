<?php

	function connect_to_db() {
		$host = "";
		$user = "";
		$password = "";
		$database = "";

		return new mysqli($host,$password,$user,$database);
		}

?>
