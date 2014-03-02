<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '4', 'total_pages' => $num_sections, 'section_name' => 'What Foods Are OK?',
				'previous_page' => 'what_drinks_are_ok.php', 'next_page' => 'what_foods_are_not_ok.php');

	$page->render('views/footer.php', $lookups);
?>
