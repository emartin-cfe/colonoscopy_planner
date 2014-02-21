<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '8', 'total_pages' => '20', 'section_name' => 'FAQs About Your Meds',
				'previous_page' => 'preparing_for_your_colonoscopy.php', 'next_page' => 'faqs_about_your_meds_2.php');

	$page->render('views/footer.php', $lookups);
?>
