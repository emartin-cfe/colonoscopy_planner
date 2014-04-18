<?php
	require('num_sections.php');
	require('rendering/rendering_engine.php');
	require('logging/audit.php');

    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; $hash = $_GET['auth']; }

    $query = "SELECT bowel_prep FROM patient WHERE SHA1='$hash'";
	$mysqli = connect_to_db();
    $result = $mysqli->query($query);
    $row = $result->fetch_array();
    $bowel_prep = $row['bowel_prep'];

    $page = new Page();
    $page->render('views/header.php', $lookups);

	$lookups = array('bowel_prep' => $bowel_prep);
    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'total_pages' => $num_sections, 'section_name' => 'Frequently Asked Questions',
						'previous_page' => 'instruction_checklist.php');

    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);
?>
