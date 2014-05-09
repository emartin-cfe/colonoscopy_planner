<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; } else { $hash = ''; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$query = "SELECT appointment_time, bowel_prep, single_or_split FROM Patient WHERE SHA1='$hash'";

    if($result = $mysqli->query($query)) {
    	$row = $result->fetch_array();
		}

	$appointment = (isset($row)) ? $row['appointment_time'] : '';
   	$date_today = $appointment != '' ? date($FULL_DT_FORMAT, strtotime($appointment)) : 'Day of appointment';
	$date_yesterday = $appointment != '' ? date($FULL_DT_FORMAT, strtotime($appointment . ' - 1 day')) : 'Day before appointment';
	$date_fish_oil = $appointment != '' ? date('F d', strtotime($appointment . ' - 2 day')): '2 days before';
   	$day_today  = $appointment != '' ? date($DAY_FORMAT, strtotime($appointment)) : 'Today';
	$day_yesterday = $appointment != '' ? date($DAY_FORMAT, strtotime($appointment . ' - 1 day')): 'WAKKA';
	$appointment_time = $appointment != '' ? date($HOUR_FORMAT, strtotime($appointment)): '15 min before appointment';
   	$preparation_time = $appointment != '' ? date($HOUR_FORMAT, strtotime($appointment . ' - 4 hours')): '?';
	$pickup_time = $appointment != '' ? date($HOUR_FORMAT, strtotime($appointment . ' + 2 hours + 30 minutes')): '';
	$bowel_prep = (isset($row) && isset($row['bowel_prep'])) ? $bowel_prep = $row['bowel_prep'] : $bowel_prep = 'bowel prep';
	$single_or_split = (isset($row)) ? $row['single_or_split'] : '';

	$lookups = array(	'date_of_appointment' => $date_today, 'date_before_appointment' => $date_yesterday, 'single_or_split' => $single_or_split,
						'date_fish_oil' => $date_fish_oil, 'bowel_prep' => $bowel_prep,
						'day_today' => $day_today, 'day_yesterday' => $day_yesterday,
						'appointment_time' => $appointment_time, 'preparation_time' => $preparation_time, 'pickup_time' => $pickup_time);
 	if ($single_or_split == "split") { $page->render('views/' . basename( __FILE__), $lookups); }
	else { $page->render('views/instruction_checklist.php', $lookups); }

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'Instruction Checklist',
						'previous_page' => 'when_is_prep_complete.php', 'next_page' => 'frequently_asked_questions.php',
						'nav_conditions' => 'if ((document.checklist_printed === false) && (!confirm("We noticed you did not print the checklist - are you sure you want to go to the next page?"))) return false;');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
