<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; } else { $hash = ""; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT appointment_time, bowel_prep FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();

	$preparation_time = date($HOUR_FORMAT, strtotime($row['appointment_time'] . ' - 4 hours'));
    $appointment_date = date($FULL_DT_FORMAT, strtotime($row['appointment_time']));
	$bowel_prep = $row['bowel_prep'];
    $lookups = array('appointment_date' => $appointment_date, 'prep_time' => $preparation_time, 'bowel_prep' => $bowel_prep);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '3', 'total_pages' => $num_sections, 'section_name' => 'Your calendar - DAY of Your Colonoscopy',
						'previous_page' => 'day_of_colonoscopy.php', 'next_page' => 'preparing_for_your_colonoscopy_3.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
