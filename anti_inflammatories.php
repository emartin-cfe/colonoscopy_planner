<?php
	require('rendering/rendering_engine.php');
	$page = new Page();

	$page->render('views/header.php');

	$next_page = "aspirin.php";

	$lookups = array(	'question' => 'Do you take anti-inflammatories such as Advil, Ibuprofen, or Motrin?',
				'image_1' => 'anti_inflammatories.jpg', 'height_1' => 209, 'width_1' => 582,
				'image_2' => 'anti_inflammatories_ok.jpg', 'height_2' => 209, 'width_2' => 582,
				'notify_type' => 'success',
				'question_warning' => 'Continue to take this medicine as needed.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page);

	$page->render('views/question_answer.php', $lookups);
?>
