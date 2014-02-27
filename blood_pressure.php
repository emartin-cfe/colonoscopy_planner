<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "anti_inflammatories.php";

	$lookups = array(	'question' => 'Do you take blood pressure medicine?',
				'image_1' => 'pills_blood_pressure.jpg', 'height_1' => 220, 'width_1' => 300,
				'image_2' => 'pills_yes.jpg', 'height_2' => 220, 'width_2' => 300,
				'notify_type' => 'success',
				'question_warning' => 'Keep taking your medicine. On the day of your test, take your blood pressure medicine two hours before your test.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page);

	$page->render('views/question_answer.php', $lookups);
?>
