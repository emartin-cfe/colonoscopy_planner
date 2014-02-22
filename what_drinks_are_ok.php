<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '14', 'total_pages' => '19', 'section_name' => 'What Drinks Are OK?',
				'previous_page' => 'what_is_a_clear_liquid.php', 'next_page' => 'what_foods_are_ok.php');

	$page->render('views/footer.php', $lookups);
?>
