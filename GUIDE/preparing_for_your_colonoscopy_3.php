<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);
	$page->render('views/' . basename( __FILE__));

    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $query = "SELECT single_or_split FROM patient WHERE SHA1='$hash'";
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $previous_page = "day_of_colonoscopy_2.php";
    if ($row['single_or_split'] = 'single') { $previous_page = "day_of_colonoscopy_SINGLE_2.php"; }
	$lookups = array(	'page_num' => '4', 'total_pages' => $num_sections, 'section_name' => 'What can you eat and drink?',
						'previous_page' => $previous_page, 'next_page' => 'what_is_a_clear_liquid.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
