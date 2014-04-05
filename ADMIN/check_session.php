<?php

	function check_session() {
    	session_start();
    	if (!$_SESSION['signed_in']) {
        	header("Location: index.html");
        	exit;
        	}

		date_default_timezone_set('America/Vancouver');
		}

?>
