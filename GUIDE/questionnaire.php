<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '2', 'total_pages' => $num_sections, 'section_name' => 'Your Medication Routine',
						'previous_page' => 'preparing_for_your_colonoscopy.php', 'next_page' => 'questionnaire_response.php');

    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }

    $page->render('views/footer_questions.php', $lookups);

?>
