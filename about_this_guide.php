<?php
	require('logging/audit.php');

	if(!empty($_GET['auth'])) {
		$lookups['sha1'] = $_GET['auth'];
		log_access($_GET['auth'], basename( __FILE__));
		}

	require('rendering/rendering_engine.php');
	$page = new Page();
	$page->render('views/header.php', $lookups);
	$page->render('views/splash_page.php', $lookups);
?>

