<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'Instruction Checklist',
						'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'frequently_asked_questions.php',
						'nav_conditions' => 'if ((document.checklist_printed === false) && (!confirm("We noticed you did not print the checklist - are you sure you want to go to the next page?"))) return false;');

	$page->render('views/footer.php', $lookups);

	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
