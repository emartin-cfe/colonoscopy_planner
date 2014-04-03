<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/faqs_about_your_meds_2.php');

	$lookups = array(	'page_num' => '8', 'total_pages' => '19', 'section_name' => 'FAQs About Your Meds',
				'previous_page' => 'faqs_about_your_meds.php', 'next_page' => 'day_before_colonoscopy.php');

	$page->render('views/footer.php', $lookups);
?>
