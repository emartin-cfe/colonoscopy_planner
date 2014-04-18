<?php
	require('dependencies/standard_imports.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);
    $page->render('views/' . basename( __FILE__));

	$lookups = array('page_name' => 'Contact Information');
	$page->render('views/footer_low_profile.php', $lookups);
	log_access($_GET['auth'], basename( __FILE__));
?>
