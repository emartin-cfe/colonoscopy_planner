<?php
	require('dependencies/standard_imports.php');

	$lookups = array();
    if(!empty($_GET['auth'])) { $lookups['sha1'] = $_GET['auth']; }
    $page = new Page();
    $page->render('views/header.php', $lookups);

	$proceed = 1;
	$questions = array('fish_oil', 'diabetes', 'anti_platelet', 'blood_thinner', 'blood_pressure', 'advil');
	foreach ($questions as $question) {
		if (isset($_POST[$question])) { $lookups[$question] = 1; $proceed = 0; }
		}

	if ($proceed == 1) {
		if(isset($_GET['auth'])) { header('Location: preparing_for_your_colonoscopy_2.php?auth=' . $_GET['auth']); }
		else { header('Location: preparing_for_your_colonoscopy_2.php'); }
		exit;
		}

    $page->render('views/' . basename( __FILE__), $lookups);

	$lookups = array(	'page_num' => '2', 'total_pages' => $num_sections, 'section_name' => 'Your Medication Routine',
						'previous_page' => 'questionnaire.php', 'next_page' => 'preparing_for_your_colonoscopy_2.php');

    if(!empty($_GET['auth'])) { $lookups = modulate_links(basename( __FILE__), $lookups, $_GET['auth']); }
    $page->render('views/footer.php', $lookups);


	# AT THIS POINT, UPLOAD THE PATIENT DATA
	$query = 	"INSERT INTO <table> (field1, field2, field3, ...) " .
				"VALUES ('value1', 'value2','value3', ...) " .
				"ON DUPLICATE KEY UPDATE " .
				"field1='value1', field2='value2', field3='value3', ...";

?>
