<?php
	require('rendering/rendering_engine.php');
	$page = new Page();
	$page->render('views/header.php');
	$page->render('views/splash_page.php');

	# about_this_guide.php?auth=9936c4d3cbebd41d746a66802ad9467ab248d37f
	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
