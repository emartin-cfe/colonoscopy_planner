<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
	if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash=$_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

    $page->render('views/' . basename( __FILE__));


	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$query = "SELECT bowel_prep, single_or_split FROM patient WHERE SHA1='$hash'";
	$result = $mysqli->query($query);
	$row = $result->fetch_array();

	if($row['bowel_prep'] == "PicoSalax") { $next_page = 'instruction_checklist.php'; }
	else if($row['single_or_split'] == "single") { $next_page = 'instruction_checklist_SINGLE.php'; }
	else { $next_page = 'instruction_checklist.php'; }

	$lookups = array(	'page_num' => '5', 'total_pages' => $num_sections, 'section_name' => 'How Do I Know When My Bowel Prep Is Complete?',
						'previous_page' => 'what_foods_are_not_ok.php', 'next_page' => $next_page);

    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
