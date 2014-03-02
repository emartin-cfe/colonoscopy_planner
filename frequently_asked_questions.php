<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '6', 'total_pages' => $num_sections, 'section_name' => 'Frequently Asked Questions',
				'previous_page' => 'instruction_checklist.php');

	$page->render('views/footer.php', $lookups);
?>
