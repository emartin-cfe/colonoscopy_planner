<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'section_name' => 'About Colon Cancer',
				'previous_page'=>'about_your_intestines.php', 'next_page' => 'how_does_colonoscopy_work.php',
				'page_num' => '3', 'total_pages' => '20');

	$page->render('views/footer.php', $lookups);
?>
