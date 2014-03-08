<?php
	$host = "";
	$user = "";
	$password = "";
	$db = '';
	$link = mysql_connect($host, $user, $password);
	if (!$link) { die('Could not connect: ' . mysql_error()); }
	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) { die ('Can\'t use ' . $db . ': ' . mysql_error()); }
?>
