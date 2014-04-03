<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "blood_thinner.php";
	$previous_page = "anti_inflammatories.php";

	$lookups = array(	'question' => '5) Do you take aspirin or Plavix?',
				'image_1' => 'aspirin.jpg', 'height_1' => 260, 'width_1' => 391,
				'image_2' => 'aspirin_OK.jpg', 'height_2' => 260, 'width_2' => 391,
				'notify_type' => 'success',
				'question_warning' => 'You may continue to take this medicine as needed.',
				'next_page_yes' => $next_page,
				'next_page_no' => $next_page,
				'section_name' => "Managing your medication routine (Step 2 of $num_sections)",
				'previous_page' => $previous_page);

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_question_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/question_answer.php', $lookups);
?>
