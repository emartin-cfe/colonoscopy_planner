<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
	if(!empty($_GET['auth'])) {
		$lookups['sha1'] = $_GET['auth'];
		$sha1 = $_GET['auth'];
		log_access($_GET['auth'], basename( __FILE__));
		}

	$page = new Page();
	$page->render('views/header.php', $lookups);
	$page->render('views/splash_page.php', $lookups);
?>

