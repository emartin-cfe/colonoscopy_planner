<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; } else { $hash = ""; }

    $page = new Page();
    $page->render('views/header.php', $lookups);

	$mysqli = connect_to_db();
	$query = "SELECT bowel_prep FROM Patient WHERE SHA1='$hash'";

	$lookups = array();
	if($result = $mysqli->query($query)) {
    	$row = $result->fetch_array();
		}
	$lookups['bowel_prep'] = (isset($row)) ? $row['bowel_prep'] : 'bowel_prep';

    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'total_pages' => $num_sections, 'section_name' => 'Frequently Asked Questions',
						'previous_page' => 'instruction_checklist.php');
    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
