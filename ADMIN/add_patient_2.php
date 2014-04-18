<?php
    require 'check_session.php';
    check_session();

	$clinic_id = $_SESSION['clinic_id'];

	$patient_id = $_POST['patient_id'];
	$patient_email = $_POST['patient_email'];
	$appointment_date = $_POST['appointment_date'];
	$bowel_prep = $_POST['bowel_prep'];
	$split_prep = $_POST['split_prep'];

	$date = strtotime($appointment_date);
	$formatted_date = date('F d, Y', $date) . " at " . date('g:i A', $date);

	$SHA1 = sha1($patient_id);

	$query = 	"INSERT INTO Patient (patient_id, clinic_id, patient_email, SHA1, appointment_time, bowel_prep, single_or_split) " .
				"VALUES ('$patient_id', '$clinic_id', '$patient_email', '$SHA1', '$appointment_date', '$bowel_prep', '$split_prep')";

	require 'connect.php';
	$mysqli = connect_to_db();
	if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: " . $mysqli->connect_error; }
	$result = $mysqli->query($query);

	# Now generate a link
	$link = "http://24.87.64.193:10000/~emartin/patient_reminder/GUIDE/consent.php?auth=$SHA1";

	$to = $patient_email;
	$from = "eric.gm.martin@gmail.com";
	$subject = "Re: colonoscopy appointment";

	$html = 	"<p>On behalf of Pacific Gastroenterology, I am contacting you because you have been scheduled for a colonoscopy on <b>$formatted_date</b> at St. Paul's hospital (GI clinic). It is important that you prepare properly, as this will make it easier for both you and Dr. Enns to evaluate your colon properly. We have created an online guide that is tailored to your appointment. Please take the time to read it, as it contains advice that will improve the benefits procedure - while reducing discomfort.</p>" .
				"<p>Please click this link to read your personal guide: $link</p>".
				"<p>Feel free to contact me if you have anymore questions.</p>" .
				"<p>Oliver Takach, Clinical Research Coordinator</p>";

	#$headers  = 'MIME-Version: 1.0' . "\r\n";				# Needed for HTML mail
	#$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	# Needed for HTML mail
	#$headers .= 'From: Oliver Takach <oliver.tackach@gmail.com>' . "\r\n";
	#mail($to, $subject, $message, $headers);

require_once "Mail.php";
require_once "Mail/mime.php";

$config=array(
    'host'      => 'ssl://smtp.googlemail.com',
    'port'      => 465,
    'auth'      => true,
    'username'  => '<EMAIL>',
    'password'  => '<PASSWORD>'
);

$mime = new Mail_Mime("\r\n");
#$text = "Text version of email";
#$mime->setTXTBody($text);
$mime->setHTMLBody($html);

#$filepath="sample.txt";
#$fileContentType="text/plain";
#$mime->addAttachment($filepath,$fileContentType);


$body = $mime->get();

$headerInfo=array(
    'From'      => $from,
    'To'        => $to,
    'Subject'   => $subject
);
$headers = $mime->headers($headerInfo);

$smtp = Mail::factory('smtp',$config);
$mail = $smtp->send($to, $headers, $body);

	header('Location: display_patients.php')
?>
