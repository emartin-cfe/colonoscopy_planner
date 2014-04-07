<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);


    require '../ADMIN/connect.php';
    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT single_or_split FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $single_or_split = $row['single_or_split'];
    $next_page = "day_of_colonoscopy.php";
    if ($single_or_split = 'single') { $next_page = "day_of_colonoscopy_SINGLE.php"; }


 	date_default_timezone_set('America/Vancouver');
    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT appointment_time FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $appointment_date = date('l, M d Y', strtotime($row['appointment_time'] . '- 1 day'));
    $lookups = array('appointment_date' => $appointment_date);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - One Day Before Your Colonoscopy',
						'previous_page' => 'day_before_colonoscopy.php', 'next_page' => $next_page);

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
