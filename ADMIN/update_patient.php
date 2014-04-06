<?php
	require 'check_session.php';
	check_session();

	$clinic_id = $_SESSION['clinic_id'];
	$patient_id = $_GET['patient_id'];

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

	$query =	"SELECT patient_email, appointment_time, bowel_prep, single_or_split " .
				"FROM Clinics NATURAL JOIN Patient " .
				"WHERE clinic_id='$clinic_id' AND patient_id='$patient_id'";

	$result = $mysqli->query($query);

	# FIXME: CHECK IF THIS ENTRY EXISTS!
	$row = $result->fetch_array();
	$patient_email = $row['patient_email'];
	$appointment_time = $row['appointment_time'];

	$appointment_time = date("Y-m-d H:i", strtotime($appointment_time));

	$bowel_prep = $row['bowel_prep'];
	$single_or_split = $row['single_or_split'];
?>



<!DOCTYPE html>
<html>

<head>
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_page.css">
</head>

<body>

	<div id="stylized" class="myform">
		<form id="form" name="form" method="post" action="update_patient_2.php">
			<h1>Patient details</h1>
			<p></p>

			<label>Patient id</label>
			<input type="text" name="patient_id" id="patient_id" value = "<?=$patient_id?>" readonly/>

			<label>Patient email</label>
			<input type="email" name="patient_email" id="patient_email" value="<?=$patient_email?>" required/>	

			<label>Appointment date</label>
			<div id="datetimepicker" class="input-append date">
				<input type="datetime" name="appointment_date" id="appointment_date" value="<?=$appointment_time?>" required></input>
				<span class="add-on" id="custom_date_selector"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
			
			<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
			<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="bootstrap_datetime/bootstrap-datetimepicker.js"></script>
			<script type="text/javascript" src="bootstrap_datetime/bootstrap-datetimepicker.pt-BR.js"></script>
			<script type="text/javascript">
				$('#datetimepicker').datetimepicker({
					format: 'yyyy-MM-dd hh:mm',
					language: 'pt-BR',
					pickSeconds: false,
					pick12HourFormat: true,
					});
			</script>

			<label>Bowel prep</label>
			<select name="bowel_prep" id="bowel_prep">
				<?php

					# FIX THIS CODE GARBAGE LATER
					if(strtolower($bowel_prep) == "moviprep") {
						print 	'<option value="Moviprep" selected>Moviprep</option>' .
								'<option value="PEG">PEG</option>';
						}
					else {
						print 	'<option value="Moviprep">Moviprep</option>' .
								'<option value="PEG" selected>PEG</option>';
						}
				?>
			</select>

			<label>Split prep dose?</label>
			<select name="split_prep" id="split_prep">

				<?php

					# FIX THIS GARBAGE LATER
					if(strtolower($single_or_split) == "split") {
						print 	'<option value="split" selected>Split prep</option>' .
								'<option value="single">Single prep</option>';
						}
					else {
						print	'<option value="split">Split prep</option>' .
								'<option value="single" selected>Single prep</option>';
						}
				?>
			</select>

			<button type="submit">Update patient</button>
			<button type="input" onclick="window.location='display_patients.php'">Cancel</button>
			<div class="spacer"></div>
		</form>
	</div>
</body>

</html>
