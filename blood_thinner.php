<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "preparing_for_your_colonoscopy_2.php";

	$lookups = array(	'question' => 'Do you take a blood thinner like Coumadin, or warfarin?',
				'image_1' => 'warfarin_1.png', 'height_1' => 227, 'width_1' => 358,
				'image_2' => 'warfarin_2.png', 'height_2' => 200, 'width_2' => 358,
				'notify_type' => 'warning',
				'question_warning' => ' Please check with your doctor as soon as possible to determine how to proceed. Continue to take your Coumadin or warfarin after the colonoscopy.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => 'Your Medication Routine (Step 2)',
				'previous_page' => 'aspirin.php');

	$page->render('views/question_answer.php', $lookups);
?>
