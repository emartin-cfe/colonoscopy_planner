<html>
<body>

<h1>Existing entries</h1>
<table>
<tr><th>patient_id</th><th>email</th><th>link</th><th>patient_entry_date</th></tr>

<?php
	$host = "localhost";
	$user = "root";
	$password = "xtc036350858!";

	$link = mysql_connect($host, $user, $password);
	if (!$link) { die('Could not connect: ' . mysql_error()); }

	$db_selected = mysql_select_db('patient_notification', $link);
	if (!$db_selected) { die ('Can\'t use foo : ' . mysql_error()); }

	$query = 	"SELECT patient_id, email, SHA1_hash, patient_entry_date " .
			"FROM Patient";

	$result = mysql_query($query);
	if (!$result) { die('Invalid query: ' . mysql_error()); }

	while ($row = mysql_fetch_assoc($result)) {
		$patient_id = $row['patient_id'];	$email = $row['email'];
		$SHA1_hash = $row['SHA1_hash'];		$patient_entry_date = $row['patient_entry_date'];


		$website = "http://127.0.0.1/~emartin/patient_reminder/instructions.php?";
		$link = "$website" . "hash=$SHA1_hash" . "&page=page_1.php";
		print "<tr><td>$patient_id</td><td>$email</td><td>$link</td><td>$patient_entry_date</td></tr>";
		}	

?>
</table>
<br/>
<form name="input" action="add_email.php" method="get">
Add email: <input type="text" name="user">
<input type="submit" value="Submit">
</form>

</body>
</html>
