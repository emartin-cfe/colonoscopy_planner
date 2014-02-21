<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'section_name' => 'About Your Insides',
				'previous_page' => 'about_this_guide.php', 'next_page' => 'about_colon_cancer.php',
				'page_num' => '2', 'total_pages' => '20');

	$page->render('views/footer.php', $lookups);
?>
