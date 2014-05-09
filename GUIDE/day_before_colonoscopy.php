<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
	if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; } else { $hash = ''; }
	$page = new Page();
	$page->render('views/header.php', $lookups);

	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$query = "SELECT appointment_time, bowel_prep FROM patient WHERE SHA1='$hash'";
	if ($result = $mysqli->query($query)) {
		$row = $result->fetch_array();
		$appointment_day = date($DAY_FORMAT, strtotime($row['appointment_time'] . '- 1 day'));
		$appointment_date = date($CALENDAR_DT_FORMAT, strtotime($row['appointment_time'] . '- 1 day'));
		$bowel_prep = $row['bowel_prep'];
		}
	else {
		$bowel_prep = "Prep";
		$appointment_day = "Day before";
		$appointment_date = "Date";
		}

	# Special instructions for PicoSalax
	if ($bowel_prep == "PicoSalax") {
		$afternoon_prep = "Take Pico-Salax";
		$last_time = "5:00 PM";
		$bowel_prep = "Pico-Salax and Dulcolax";
		}
	else {
		$afternoon_prep = "";
		$last_time = "6:00 PM";
		}

	$lookups = array( 'appointment_day' => $appointment_day, 'appointment_date' => $appointment_date, 'bowel_prep' => $bowel_prep, 'afternoon_prep' => $afternoon_prep, 'last_time' => $last_time);
	$page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - ONE DAY Before Your Colonoscopy',
						'previous_page' => 'preparing_for_your_colonoscopy_2.php', 'next_page' => 'day_before_colonoscopy_2.php');
	if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
	$page->render('views/footer.php', $lookups);
?>
