<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "blood_pressure.php";

	$lookups = array(	'question' => 'Do you take diabetes medicine?',
				'image_1' => 'pills.jpg', 'height_1' => 200, 'width_1' => 300,
				'image_2' => 'pills_no.jpg', 'height_2' => 200, 'width_2' => 300,
				'notify_type' => 'danger',
				'question_warning' => 'Take your diabetes medicine until the night BEFORE your colonoscopy. Then, do not take your diabetes medicine on the morning of the test. Resume these medicines after the test.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page);

	$page->render('views/question_answer.php', $lookups);
?>
