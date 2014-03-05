<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "anti_inflammatories.php";

	$lookups = array(	'question' => '3) Do you take blood pressure medicine?',
				'image_1' => 'pills_blood_pressure.png', 'height_1' => 200, 'width_1' => 598,
				'image_2' => 'pills_blood_pressure_yes.png', 'height_2' => 257, 'width_2' => 598,
				'notify_type' => 'success',
				'question_warning' => 'Keep taking your medicine. On the day of your test, take your blood pressure medicine two hours before your test.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => 'Your Medication Routine (Step 2)',
				'previous_page' => 'diabetes.php');

	$page->render('views/question_answer.php', $lookups);
?>
