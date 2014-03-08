<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'section_name' => 'About Your Insides',
				'previous_page' => 'about_this_guide.php', 'next_page' => 'how_does_colonoscopy_work.php',
				'page_num' => '1', 'total_pages' => $num_sections);

	$page->render('views/footer.php', $lookups);

	# about_this_guide.php?auth=9936c4d3cbebd41d746a66802ad9467ab248d37f
	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
