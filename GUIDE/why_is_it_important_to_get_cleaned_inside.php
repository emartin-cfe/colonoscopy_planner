<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
	if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
	$page = new Page();
	$page->render('views/header.php', $lookups);
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '1', 'total_pages' => $num_sections, 'section_name' => 'About Your Insides',
						'previous_page' => 'how_does_colonoscopy_work_2.php', 'next_page' => 'preparing_for_your_colonoscopy.php');

	if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
	$page->render('views/footer.php', $lookups);
?>
