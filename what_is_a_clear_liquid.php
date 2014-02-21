<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '14', 'total_pages' => '20', 'section_name' => 'What is a "Clear liquid"?',
				'previous_page' => 'day_of_colonoscopy_2.php', 'next_page' => 'what_drinks_are_ok.php');

	$page->render('views/footer.php', $lookups);
?>
