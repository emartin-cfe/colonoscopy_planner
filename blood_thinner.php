<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "day_before_colonoscopy.php";

	$lookups = array(	'question' => 'Do you take a blood thinner like Coumadin, or warfarin?',
				'image_1' => 'blood_thinners.jpg', 'height_1' => 260, 'width_1' => 391,
				'image_2' => 'blood_thinners_not_sure.jpg', 'height_2' => 260, 'width_2' => 391,
				'notify_type' => 'warning',
				'question_warning' => ' Please check with your doctor as soon as possible to determine how to proceed. Continue to take your Coumadin or warfarin after the colonoscopy.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page);

	$page->render('views/question_answer.php', $lookups);
?>
