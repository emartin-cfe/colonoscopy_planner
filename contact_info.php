<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$doctor_contacts = array("Dr. Brown: 604.400.6000", "Dr. Smith: 778.222.3400", "Dr. Waterman: 604.228.3419", "Dr. Jackson: 604.920.9988");
	$lookups = array('contacts' => $doctor_contacts);
	$page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array('page_name' => 'Contact Information');
	$page->render('views/footer_low_profile.php', $lookups);

?>
