<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array('page_name' => 'Contact Information');
	$page->render('views/footer_low_profile.php', $lookups);

?>
