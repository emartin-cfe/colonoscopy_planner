<?php
	require('logging/audit.php');

	if(!empty($_GET['auth'])) {
		$lookups['sha1'] = $_GET['auth'];
		log_access($_GET['auth'], basename( __FILE__));
		}

    $sha1 = $_GET['auth'];
    $query =    "SELECT consent_initials FROM Patient WHERE SHA1 = '$sha1'";
    $mysqli = connect_to_db();
    if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
    $result = $mysqli->query($query);
	$row = $result->fetch_array();
	$initials = $row['consent_initials'];
	if ($initials != "") { header("Location: about_this_guide.php?auth=$sha1"); }

	require('rendering/rendering_engine.php');
	$page = new Page();

	$lookups = array('auth' => $_GET['auth']);
	$page->render('views/consent.php', $lookups);
?>

