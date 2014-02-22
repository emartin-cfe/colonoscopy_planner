<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '12', 'total_pages' => '19', 'section_name' => 'Day OF Your Colonoscopy',
				'previous_page' => 'day_of_colonoscopy.php', 'next_page' => 'what_is_a_clear_liquid.php');

	$page->render('views/footer.php', $lookups);
?>
