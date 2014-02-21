<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '11', 'total_pages' => '20', 'section_name' => 'ONE DAY Before Your Colonoscopy',
				'previous_page' => 'day_before_colonoscopy.php', 'next_page' => 'day_of_colonoscopy.php');

	$page->render('views/footer.php', $lookups);
?>
