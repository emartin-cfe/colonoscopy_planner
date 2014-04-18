<?php
	require('dependencies/standard_imports.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT single_or_split, appointment_time, bowel_prep FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();

	$next_page = "day_of_colonoscopy.php";
	if ($row['single_or_split'] == 'single') { $next_page = "day_of_colonoscopy_SINGLE.php"; }
    $appointment_date = date($FULL_DT_FORMAT , strtotime($row['appointment_time'] . '- 1 day'));
    $lookups = array('appointment_date' => $appointment_date, 'bowel_prep' => $row['bowel_prep']);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - One Day Before Your Colonoscopy',
						'previous_page' => 'day_before_colonoscopy.php', 'next_page' => $next_page);
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
