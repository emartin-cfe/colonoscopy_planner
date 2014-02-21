<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '18', 'total_pages' => '20', 'section_name' => 'How Do I Know When My Bowel Prep Is Complete?',
				'previous_page' => 'what_foods_are_not_ok.php', 'next_page' => 'frequently_asked_questions.php');

	$page->render('views/footer.php', $lookups);
?>
