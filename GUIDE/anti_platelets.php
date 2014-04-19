<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "blood_thinner.php";
	$previous_page = "aspirin.php";

	$lookups = array(	'question' => '6) Do you take Plavix or anti-platelet drugs?',
						'image_1' => 'Plavix.jpg', 'width_1' => 300,
						'image_2' => 'Plavix.jpg', 'width_2' => 300,
						'notify_type' => 'warning',
						'question_warning' => 'Give us a call at (604) 688-6332, extension 222 if you take Plavix or anti-platelet medication.',
						'next_page_yes' => $next_page,
						'next_page_no' => $next_page,
						'section_name' => "Managing your medication routine (Step 2 of $num_sections)",
						'previous_page' => $previous_page);

    if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/question_answer.php', $lookups);
?>
