<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '4', 'total_pages' => $num_sections, 'section_name' => 'What Foods Are NOT OK?',
						'previous_page' => 'what_foods_are_ok.php', 'next_page' => 'when_is_prep_complete.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
