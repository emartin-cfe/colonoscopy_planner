<?php

	if(!empty($_GET['auth'])) {
		log_access($_GET['auth'], basename( __FILE__));
		$next_page = $next_page . "?auth=" . $_GET['auth'];
		$previous_page = $previous_page . "?auth=" . $_GET['auth'];
		$lookups['next_page_yes'] = $next_page;
		$lookups['next_page_no'] = $next_page;
		$lookups['previous_page'] = $previous_page;
		} 

?>
