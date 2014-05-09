<?php
	require('dependencies/standard_imports.php');

	$lokups = array();
    #if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; }

	$hash = (empty($_GET['auth'])) ? "" : $_GET['auth'];

	$lookups = array();
	$lookups['sha1'] = (empty($_GET['auth'])) ? "" : $_GET['auth'];
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$query = "SELECT appointment_time FROM Patient WHERE SHA1='$hash'";

	if ($result = $mysqli->query($query)) {
		$row = $result->fetch_array();
		$appointment_time = (!empty($row['appointment_time'])) ? date($HOUR_FORMAT, strtotime($row['appointment_time'])) : 'Appointment';
		$appointment_day = (!empty($row['appointment_time'])) ? date($DAY_FORMAT, strtotime($row['appointment_time'])) : 'Your appointment';
		$appointment_date = (!empty($row['appointment_time'])) ? date($CALENDAR_DT_FORMAT, strtotime($row['appointment_time'])) : 'Day of';
		}
	else {
		$appointment_time = "";
		$appointment_day = "";
		$appointment_date = "";
		}
	$lookups = array( 'appointment_day' => $appointment_day, 'appointment_date' => $appointment_date, 'appointment_time' => $appointment_time);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - ONE DAY Before Your Colonoscopy',
						'previous_page' => 'day_before_colonoscopy_2.php', 'next_page' => 'day_of_colonoscopy_SINGLE_2.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $hash); }
    $page->render('views/footer.php', $lookups);
?>
