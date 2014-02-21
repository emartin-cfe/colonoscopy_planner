<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '10', 'total_pages' => '20', 'section_name' => 'ONE DAY Before Your Colonoscopy',
				'previous_page' => 'faqs_about_your_meds_2.php', 'next_page' => 'day_before_colonoscopy_2.php');

	$page->render('views/footer.php', $lookups);
?>
