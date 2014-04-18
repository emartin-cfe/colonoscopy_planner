<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "preparing_for_your_colonoscopy_2.php";
	$previous_page = "anti_platelets.php";

	$lookups = array(	'question' => '7) Do you take a blood thinner like Coumadin, or warfarin?',
				'image_1' => 'warfarin_1.png', 'height_1' => 227, 'width_1' => 358,
				'image_2' => 'warfarin_2.png', 'height_2' => 200, 'width_2' => 358,
				'notify_type' => 'warning',
				'question_warning' => ' Please check with your doctor as soon as possible to determine how to proceed. Continue to take your Coumadin or warfarin after the colonoscopy.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => " Managing your medication routine (Step 2 of $num_sections)",
				'previous_page' => $previous_page);

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/question_answer.php', $lookups);
?>
