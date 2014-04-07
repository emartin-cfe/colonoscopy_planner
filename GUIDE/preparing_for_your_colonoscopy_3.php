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
    $previous_page = "day_of_colonoscopy_2.php";
    if ($single_or_split = 'single') { $previous_page = "day_of_colonoscopy_SINGLE_2.php"; }


    $page->render('views/' . basename( __FILE__));

	$lookups = array(	'page_num' => '4', 'total_pages' => $num_sections, 'section_name' => 'What can you eat and drink?',
						'previous_page' => $previous_page, 'next_page' => 'what_is_a_clear_liquid.php');

    require('logging/audit.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
