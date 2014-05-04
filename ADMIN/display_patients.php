<?php
	require 'check_session.php';
	check_session();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
</head>

<body>

<h1>Patient colonoscopy appointments</h1>

<div class="tableContainer">
	<table id='hor-minimalist-b'>

		<thead>
			<tr>
				<th scope='col'>Patient ID</th>
				<th scope='col'>Patient email</th>
				<th scope='col'>Appointment arrival time</th>
				<th scope='col'>Bowel prep</th>
				<th scope='col'>Prep timing</th>
				<th scope='col'>Status</th>
			</tr>
		</thead>

		<tbody>
<?php
	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }

	$clinic_id = $_SESSION['clinic_id'];

	$query = 	"SELECT patient_id, patient_email, appointment_time, bowel_prep, single_or_split, patient_status, consent_initials " .
				"FROM Clinics NATURAL JOIN Patient " .
				"WHERE clinic_id='$clinic_id' " .
				"ORDER BY patient_status, appointment_time DESC";

	$result = $mysqli->query($query);

	while ($row = $result->fetch_array()) {

		$patient_id = $row['patient_id'];			$patient_email = $row['patient_email'];
		$appointment = $row['appointment_time'];	$bowel_prep = $row['bowel_prep'];
		$single_or_split = $row['single_or_split'];	$patient_status = $row['patient_status'];
		$consent_initials = $row['consent_initials'];

		# 2014-04-30 15:15:00
		$appointment = date("M d Y - H:i", strtotime($appointment));

		# FIXME: THIS IS CLEARLY INEFFICIENT IF WE HAVE THOUSANDS OF ENTRIES
		if ($patient_status == 'active') {
				if ($consent_initials != "") {
					$patient_status = 'consented';
				}
				else {
					$patient_status = '';
					}
			}


	    print 	"\n\n\t\t\t<tr onclick=\"window.location.href = 'update_patient.php?patient_id=$patient_id';\">" .
				"\n\t\t\t\t<td>$patient_id</td>" .
				"\n\t\t\t\t<td>$patient_email</td>" .
				"\n\t\t\t\t<td>$appointment</td>" .
				"\n\t\t\t\t<td>$bowel_prep</td>" .
				"\n\t\t\t\t<td>$single_or_split</td>" .
				"\n\t\t\t\t<td>$patient_status</td>" .
				"\n\t\t\t</tr>";
	    }   

	$result->close();
	$mysqli->close();
?>

		</tbody>
	</table>
</div>

<div class="buttons">
	<button type="submit" class="positive" onclick="window.location='add_patient.php'"> <img src="images/addNew.png"/> New patient</button>
	<button type="submit" class="positive" onclick="window.location='logout.php'"> <img src="images/logout.png"/> Logout</button>
</div>

</body>

</html>
