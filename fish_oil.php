<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "diabetes.php";

	$lookups = array(	'question' => '1) Do you take fish oil?',
				'image_1' => 'fish_oil.jpg', 'height_1' => 200, 'width_1' => 200,
				'image_2' => 'fish_oil_no.jpg', 'height_2' => 200, 'width_2' => 200,
				'notify_type' => 'danger',
				'question_warning' => 'STOP taking fish oil two days before your colonoscopy.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'previous_page' => 'preparing_for_your_colonoscopy.php',
				'section_name' => "Managing your medication routine (Step 2 of $num_sections)");

	$page->render('views/question_answer.php', $lookups);

	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
