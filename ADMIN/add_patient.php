<?php
    require 'check_session.php';
    check_session();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_page.css">
</head>

<body>
	<div id="stylized" class="myform">
		<form id="form" name="form" method="post" action="add_patient_2.php">
			<h1>New patient details</h1>
			<p>Patient will be emailed a link to the web guide.</p>

			<label>Patient id</label>
			<input type="text" name="patient_id" id="patient_id" required/>

			<label>Patient email</label>
			<input type="email" name="patient_email" id="patient_email" required/>	

			<label>Appointment date</label>
			<div id="datetimepicker" class="input-append date">
				<input type="datetime" name="appointment_date" id="appointment_date" required></input>
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
			<select name="bowel_prep" id="bowel_prep" required>
				<option value="">Please select</option>
				<option value="Moviprep">Moviprep</option>
				<option value="PEG">PEG</option>
			</select>

			<label>Split prep dose?</label>
			<select name="split_prep" id="split_prep" required>
				<option value="">Please select</option>
				<option value="split">Split prep</option>
				<option value="single">Single prep</option>
			</select>

			<button type="submit" onclick="return validate_new_patient();">Add patient</button>
			<button type="input" onclick="window.location='display_patients.php'">Cancel</button>

			<div class="spacer"></div>
		</form>
	</div>
</body>

</html>
