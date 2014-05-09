<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth'];  }
	$hash = (!empty($_GET['auth'])) ? $_GET['auth'] : "";
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $result = $mysqli->query("SELECT appointment_time FROM Patient WHERE SHA1='$hash'");
    if ($row = $result->fetch_array()) {
		$appointment_time = (!empty($row['appointment_time'])) ? date($HOUR_FORMAT, strtotime($row['appointment_time'])) : '';
    	$appointment_date = (!empty($row['appointment_time'])) ? date($CALENDAR_DT_FORMAT, strtotime($row['appointment_time'])) : '';
		}
	else {
		$appointment_time = "YY/MM/DD";
		$appointment_date = "YY/MM/DD";
		}
    $lookups = array('appointment_date' => $appointment_date, 'appointment_time' => $appointment_time);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - DAY of Your Colonoscopy',
						'previous_page' => 'day_of_colonoscopy_SINGLE.php', 'next_page' => 'preparing_for_your_colonoscopy_3.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
