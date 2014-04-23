<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; } else { $hash = ''; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $result = $mysqli->query( "SELECT appointment_time, bowel_prep, single_or_split FROM patient WHERE SHA1='$hash'");
    $row = $result->fetch_array();
	$appointment = $row['appointment_time'];
    $date_today = date($FULL_DT_FORMAT, strtotime($appointment));
	$date_yesterday = date($FULL_DT_FORMAT, strtotime($appointment . ' - 1 day'));
	$date_fish_oil = date('F d', strtotime($appointment . ' - 2 day'));
    $day_today  = date($DAY_FORMAT, strtotime($appointment));
	$day_yesterday = date($DAY_FORMAT, strtotime($appointment . ' - 1 day'));
	$appointment_time = date($HOUR_FORMAT, strtotime($appointment));
    $preparation_time = date($HOUR_FORMAT, strtotime($appointment . ' - 4 hours'));
	$pickup_time =  date($HOUR_FORMAT, strtotime($appointment . ' + 2 hours + 30 minutes'));

	if(isset($row['bowel_prep'])) { $bowel_prep = $row['bowel_prep']; } else { $bowel_prep = 'bowel prep'; }

	$lookups = array(	'date_of_appointment' => $date_today, 'date_before_appointment' => $date_yesterday, 'single_or_split' => $row['single_or_split'],
						'date_fish_oil' => $date_fish_oil, 'bowel_prep' => $bowel_prep,
						'day_today' => $day_today, 'day_yesterday' => $day_yesterday,
						'appointment_time' => $appointment_time, 'preparation_time' => $preparation_time, 'pickup_time' => $pickup_time);
 	if ($row['single_or_split'] == "split") { $page->render('views/' . basename( __FILE__), $lookups); }
	else { $page->render('views/instruction_checklist_SINGLE.php', $lookups); }

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'Instruction Checklist',
						'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'frequently_asked_questions.php',
						'nav_conditions' => 'if ((document.checklist_printed === false) && (!confirm("We noticed you did not print the checklist - are you sure you want to go to the next page?"))) return false;');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
