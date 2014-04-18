<?php
	require('dependencies/standard_imports.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "diabetes.php";
	$previous_page = "preparing_for_your_colonoscopy.php";

	$lookups = array(	'question' => '1) Do you take fish oil?',
						'image_1' => 'fish_oil.jpg', 'height_1' => 200, 'width_1' => 200,
						'image_2' => 'fish_oil_no.jpg', 'height_2' => 200, 'width_2' => 200,
						'notify_type' => 'danger',
						'question_warning' => 'STOP taking fish oil two days before your colonoscopy.',
						'next_page_yes' => $next_page,
						'next_page_no' => $next_page,
						'previous_page' => $previous_page,
						'section_name' => "Managing your medication routine (Step 2 of $num_sections)");

	if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
	$page->render('views/question_answer.php', $lookups);
?>
