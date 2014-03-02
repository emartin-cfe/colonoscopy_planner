<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'Instruction Checklist',
				'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'frequently_asked_questions.php');

	$page->render('views/footer.php', $lookups);
?>
