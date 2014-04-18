<?php
	require('num_sections.php');
	require('logging/audit.php');
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);



    date_default_timezone_set('America/Vancouver');
    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT appointment_time, bowel_prep, single_or_split FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();

	$single_or_split = $row['single_or_split'];

    $date_today = date('F d, Y', strtotime($row['appointment_time']));
	$date_yesterday = date('F d, Y', strtotime($row['appointment_time'] . ' - 1 day'));
	$date_fish_oil = date('F d', strtotime($row['appointment_time'] . ' - 2 day'));

    $day_today  = date('l', strtotime($row['appointment_time']));
	$day_yesterday = date('l', strtotime($row['appointment_time'] . ' - 1 day'));

	$appointment_time = date('g:i A', strtotime($row['appointment_time']));

    $preparation_time = date('g:i A', strtotime($row['appointment_time'] . ' - 4 hours'));
    $appointment_time = date('g:i A', strtotime($row['appointment_time']));
	$pickup_time =  date('g:i A', strtotime($row['appointment_time'] . ' + 2 hours + 30 minutes'));

	$lookups = array(	'date_of_appointment' => $date_today, 'date_before_appointment' => $date_yesterday,
						'date_fish_oil' => $date_fish_oil, 'bowel_prep' => $row['bowel_prep'],
						'day_today' => $day_today, 'day_yesterday' => $day_yesterday,
						'appointment_time' => $appointment_time, 'preparation_time' => $preparation_time, 'pickup_time' => $pickup_time);


 	if ($single_or_split == "split") {
    	$page->render('views/' . basename( __FILE__), $lookups);
		}

	else {
		$page->render('views/instruction_checklist_SINGLE.php', $lookups);
		}


	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'Instruction Checklist',
						'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'frequently_asked_questions.php',
						'nav_conditions' => 'if ((document.checklist_printed === false) && (!confirm("We noticed you did not print the checklist - are you sure you want to go to the next page?"))) return false;');

    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
