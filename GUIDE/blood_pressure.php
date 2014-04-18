<?php
	require('dependencies/standard_imports.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "anti_inflammatories.php";
	$previous_page = "diabetes.php";

	$lookups = array(	'question' => '3) Do you take blood pressure medicine?',
				'image_1' => 'pills_blood_pressure.png', 'height_1' => 200, 'width_1' => 598,
				'image_2' => 'pills_blood_pressure_yes.png', 'height_2' => 257, 'width_2' => 598,
				'notify_type' => 'success',
				'question_warning' => 'Keep taking your medicine. On the day of your test, take your blood pressure medicine as usual before your test.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => "Managing your medication routine (Step 2 of $num_sections)",
				'previous_page' => $previous_page);

    if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/question_answer.php', $lookups);
?>
