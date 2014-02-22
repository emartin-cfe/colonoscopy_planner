<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'section_name' => 'About Your Insides',
				'previous_page' => 'about_this_guide.php', 'next_page' => 'how_does_colonoscopy_work.php',
				'page_num' => '2', 'total_pages' => '19');

	$page->render('views/footer.php', $lookups);
?>
