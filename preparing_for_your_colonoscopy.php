<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '2', 'total_pages' => $num_sections, 'section_name' => 'Your Medication Routine',
				'previous_page' => 'why_is_it_important_to_get_cleaned_inside.php', 'next_page' => 'fish_oil.php');

	$page->render('views/footer.php', $lookups);
?>
