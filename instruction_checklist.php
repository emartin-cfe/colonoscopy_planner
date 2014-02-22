<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '19', 'total_pages' => '19', 'section_name' => 'Instruction Checklist',
				'previous_page' => 'frequently_asked_questions.php');

	$page->render('views/footer.php', $lookups);
?>
