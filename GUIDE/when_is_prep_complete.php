<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	
	if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);
    $page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'How Do I Know When My Bowel Prep Is Complete?',
						'previous_page' => 'what_foods_are_not_ok.php', 'next_page' => 'instruction_checklist.php');

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>