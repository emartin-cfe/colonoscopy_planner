<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');


    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);
    $page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - ONE DAY Before Your Colonoscopy',
						'previous_page' => 'preparing_for_your_colonoscopy_2.php', 'next_page' => 'day_before_colonoscopy_2.php');

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>