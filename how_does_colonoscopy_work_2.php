<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '5', 'total_pages' => '20', 'section_name' => 'How Does A Colonoscopy Work?',
				'previous_page'=>'how_does_colonoscopy_work.php', 'next_page' => 'why_is_it_important_to_get_cleaned_inside.php');

	$page->render('views/footer.php', $lookups);
?>
