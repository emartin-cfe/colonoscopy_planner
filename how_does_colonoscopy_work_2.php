<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '1', 'total_pages' => $num_sections, 'section_name' => 'About Your Insides',
				'previous_page'=>'how_does_colonoscopy_work.php', 'next_page' => 'why_is_it_important_to_get_cleaned_inside.php');

	$page->render('views/footer.php', $lookups);
?>
