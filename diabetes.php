<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	require('logging/audit.php');

	if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
	$page = new Page();
	$page->render('views/header.php', $lookups);

	$previous_page = 'fish_oil.php';
	$next_page = "blood_pressure.php";

	$lookups = array(	'question' => '2) Do you take diabetes medicine?',
						'image_1' => 'diabetes_pills.png', 'height_1' => 260, 'width_1' => 640,
						'image_2' => 'diabetes_pills_no.png', 'height_2' => 260, 'width_2' => 640,
						'notify_type' => 'danger',
						'question_warning' => 'Take your diabetes medicine until the night BEFORE your colonoscopy. Then, do not take your diabetes medicine on the morning of the test. Resume these medicines after the test.',
						'next_page_yes' => $next_page,
						'next_page_no' => $next_page,
						'section_name' => "Managing your medication routine (Step 2 of $num_sections)",
						'previous_page' => $previous_page);

    if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/question_answer.php', $lookups);
?>
