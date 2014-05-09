<?php
	require('dependencies/standard_imports.php');

	$page = new Page();
	$lookups = array();
	if(isset($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
	$page->render('views/header.php', $lookups);

	if(!empty($_GET['auth'])) {
		$lookups['sha1'] = $_GET['auth'];
		$sha1 = $_GET['auth'];
		log_access($_GET['auth'], basename( __FILE__));
		}

	$page->render('views/splash_page.php', $lookups);
?>

