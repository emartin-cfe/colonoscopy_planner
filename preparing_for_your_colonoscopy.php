<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '7', 'total_pages' => '20', 'section_name' => 'Preparing For Your Colonoscopy',
				'previous_page' => 'why_is_it_important_to_get_cleaned_inside.php', 'next_page' => 'faqs_about_your_meds.php');

	$page->render('views/footer.php', $lookups);
?>
