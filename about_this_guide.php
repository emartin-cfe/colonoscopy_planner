<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'section_name' => 'About This Guide',
				'next_page' => 'about_your_intestines.php',
				'page_num' => '1', 'total_pages' => '20');

	$page->render('views/footer.php', $lookups);
?>
