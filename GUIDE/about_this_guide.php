<?php
	require('logging/audit.php');

	if(!empty($_GET['auth'])) {
		$lookups['sha1'] = $_GET['auth'];
		$sha1 = $_GET['auth'];
		log_access($_GET['auth'], basename( __FILE__));
		}

	require('rendering/rendering_engine.php');
	$page = new Page();

	$lookups = array('sha1' => $_GET['auth']);
	$page->render('views/header.php', $lookups);

	$lookups = array('sha1' => $_GET['auth']);
	$page->render('views/splash_page.php', $lookups);
?>

