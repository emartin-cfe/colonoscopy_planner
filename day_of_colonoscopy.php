<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '12', 'total_pages' => '20', 'section_name' => 'DAY of Your Colonoscopy',
				'previous_page' => 'day_before_colonoscopy_2.php', 'next_page' => 'day_of_colonoscopy_2.php');

	$page->render('views/footer.php', $lookups);
?>
