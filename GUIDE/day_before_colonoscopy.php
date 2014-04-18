<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$result = $mysqli->query("SELECT appointment_time, bowel_prep FROM patient WHERE SHA1='$hash'");
	$row = $result->fetch_array();
	$appointment_day = date($DAY_FORMAT, strtotime($row['appointment_time'] . '- 1 day'));
	$appointment_date = date($CALENDAR_DT_FORMAT, strtotime($row['appointment_time'] . '- 1 day'));
	$lookups = array( 'appointment_day' => $appointment_day, 'appointment_date' => $appointment_date, 'bowel_prep' => $row['bowel_prep']);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - ONE DAY Before Your Colonoscopy',
						'previous_page' => 'preparing_for_your_colonoscopy_2.php', 'next_page' => 'day_before_colonoscopy_2.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
