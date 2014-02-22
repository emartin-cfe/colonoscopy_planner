<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '18', 'total_pages' => '19', 'section_name' => 'Frequently Asked Questions',
				'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'instruction_checklist.php');

	$page->render('views/footer.php', $lookups);
?>
