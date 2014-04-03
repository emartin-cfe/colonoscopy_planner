<?php
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);
    $page->render('views/' . basename( __FILE__));

	$lookups = array('page_name' => 'Table Of Contents');
  	$page->render('views/footer_low_profile.php', $lookups);

	require('logging/audit.php');
	log_access($_GET['auth'], basename( __FILE__));

?>
