<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '4', 'total_pages' => $num_sections, 'section_name' => 'What is a clear liquid?',
				'previous_page' => 'preparing_for_your_colonoscopy_3.php', 'next_page' => 'what_drinks_are_ok.php');

	$page->render('views/footer.php', $lookups);
?>
