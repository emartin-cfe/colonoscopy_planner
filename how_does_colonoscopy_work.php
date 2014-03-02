<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '1', 'total_pages' => $num_sections, 'section_name' => 'About Your Insides',
				'previous_page'=>'about_your_intestines.php', 'next_page' => 'how_does_colonoscopy_work_2.php');

	$page->render('views/footer.php', $lookups);
?>
