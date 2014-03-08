<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '2', 'total_pages' => $num_sections, 'section_name' => 'Your Medication Routine',
				'previous_page' => 'why_is_it_important_to_get_cleaned_inside.php', 'next_page' => 'fish_oil.php');

	$page->render('views/footer.php', $lookups);

	# about_this_guide.php?auth=9936c4d3cbebd41d746a66802ad9467ab248d37f
	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
