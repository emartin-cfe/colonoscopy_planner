<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$next_page = "anti_platelets.php";
	$previous_page = "anti_inflammatories.php";

	$lookups = array(	'question' => '5) Do you take aspirin once a day?',
				'image_1' => 'aspirin.jpg', 'width_1' => 300,
				'image_2' => 'aspirin_OK.jpg', 'height_2' => 229,
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
