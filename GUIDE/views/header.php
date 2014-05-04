<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" href="magnific-popup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">
</head>

<body>

<div id="container">

	<div id="header">
		<img class="logo_small" height="60" src="images/UBC_logo.png">
		<h1>Your colonoscopy guide</h1>
	</div>

	<div id="top_navigation" class="btn-group btn-group">
		<button type="button" class="btn btn-primary btn-lg" onclick="window.location='table_of_contents.php<?php if(!empty($lookups['sha1'])) { echo "?auth=" . $lookups['sha1']; }?>'">Table of contents</button>
		<button type="button" class="btn btn-primary btn-lg" onclick="window.location='instruction_checklist.php<?php if(!empty($lookups['sha1'])) { echo "?auth=" . $lookups['sha1']; }?>'">Checklist</button>
		<button type="button" class="btn btn-primary btn-lg" onclick="window.location='contact_info.php<?php if(!empty($lookups['sha1'])) { echo "?auth=" . $lookups['sha1']; }?>'">Clinic location</button>
	</div>

	<div id="content">
