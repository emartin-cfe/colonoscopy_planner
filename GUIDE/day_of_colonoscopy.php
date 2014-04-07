<?php
 	require('num_sections.php');
	require('rendering/rendering_engine.php');


    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);


    date_default_timezone_set('America/Vancouver');
    require '../ADMIN/connect.php';
    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT appointment_time FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $appointment_date = date('M d, Y', strtotime($row['appointment_time']));

	$appointment_day = date('l', strtotime($row['appointment_time']));
	$preparation_time = date('g:i A', strtotime($row['appointment_time'] . ' - 4 hours'));
	$appointment_time = date('g:i A', strtotime($row['appointment_time']));


    $lookups = array('appointment_date' => $appointment_date, 'appointment_time' => $appointment_time, 'preparation_time' => $preparation_time, 'appointment_day' => $appointment_day);
    $page->render('views/' . basename( __FILE__), $lookups);


	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - Day OF Your Colonoscopy',
						'previous_page' => 'day_before_colonoscopy_2.php', 'next_page' => 'day_of_colonoscopy_2.php');

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
