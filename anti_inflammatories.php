<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "aspirin.php";

	$lookups = array(	'question' => '4) Do you take anti-inflammatories such as Advil or Ibuprofen?',
				'image_1' => 'anti_inflammatories.jpg', 'height_1' => 209, 'width_1' => 582,
				'image_2' => 'anti_inflammatories_ok.jpg', 'height_2' => 209, 'width_2' => 582,
				'notify_type' => 'success',
				'question_warning' => 'Continue to take this medicine as needed.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => "Managing your medication routine (Step 2 of $num_sections)",
				'previous_page' => 'blood_pressure.php');

	$page->render('views/question_answer.php', $lookups);

	require('logging/audit.php');
	if(!empty($_GET['auth'])) { log_access($_GET['auth'], basename( __FILE__)); }
?>
