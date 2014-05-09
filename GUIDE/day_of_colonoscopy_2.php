<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; } else { $hash = ""; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT appointment_time, bowel_prep FROM Patient WHERE SHA1='$hash'";

	if($result = $mysqli->query($query)) {
    	$row = $result->fetch_array();
		$preparation_time = date($HOUR_FORMAT, strtotime($row['appointment_time'] . ' - 4 hours'));
    	$appointment_date = date($FULL_DT_FORMAT, strtotime($row['appointment_time']));
		$bowel_prep = $row['bowel_prep'];

		# If the patient has to prepare between 3:00 AM - 10:00 AM, stress it's important to get up early
		$date1 = DateTime::createFromFormat('H:i A', date($HOUR_FORMAT, strtotime($row['appointment_time'] . ' - 4 hours')));
		$date2 = DateTime::createFromFormat('H:i A', "3:00 AM");
		$date3 = DateTime::createFromFormat('H:i A', "10:00 AM");
		if ($date1 > $date2 && $date1 < $date3) { $extra_message = " (even if it means getting up early)"; } else { $extra_message = ""; }
		}

	else {
		$preparation_time = "prep time";
		$appointment_date = "appointment time";
		$bowel_prep = "bowel_prep";
		$extra_message = "";
		}
    $lookups = array('appointment_date' => $appointment_date, 'prep_time' => $preparation_time, 'bowel_prep' => $bowel_prep, 'extra_message' => $extra_message);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - DAY of Your Colonoscopy',
						'previous_page' => 'day_of_colonoscopy.php', 'next_page' => 'preparing_for_your_colonoscopy_3.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
