<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');
	$page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '5', 'total_pages' => '19', 'section_name' => 'Why is it important to get cleaned inside?',
				'previous_page' => 'how_does_colonoscopy_work_2.php', 'next_page' => 'preparing_for_your_colonoscopy.php');

	$page->render('views/footer.php', $lookups);
?>
