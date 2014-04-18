<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../GUIDE/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/consent.css">

	<script>

	function check_inputs () {
		if(!document.getElementById("left_radio").checked) { window.alert("You need to consent in order to use the guide"); return; }
		if(document.getElementById("initials").value == "") { window.alert("You need to sign with your initials to use the guide"); return; }

		document.getElementById("consent_form").submit();
		}

	</script>
</head>

<body>

		<div id="header">
			<div id="inner_header">
				<img height="60" src="../GUIDE/images/UBC_logo.png">
				<div class="h1_spacer"><h1>Your colonoscopy guide</h1></div>
			</div>
		</div>

		<div id="footer">
			<div id="inner_footer">
				<form id="consent_form" name="consent_form" method="post" action="consent_2.php?auth=<?=$auth?>">
					<label for="question">Do you consent to this study?</label>
					<input type="radio" id="left_radio" name="radio_consent" value="yes"> Yes <input type="radio" id="right_radio" name="radio_consent" value="no"> No <br/><br/>
					<label for="initials">Please provide your initials:</label><input name="initials" id="initials" type="text" required/><br/><br/>
					<button id="proceed" type="button" class="btn btn-primary btn" onclick="check_inputs();">Use the guide!</button>
				</form>
			</div>
		</div>

		<div id="consent_content">
			<h2>Online consent form</h2>

			<p class="tips">We hope this consent form will clearly explain the purpose of this study to you, what we want to do, and any risks that you need to be aware of.</p>
			<p><b>Title</b>: Impact of patient education web application on the quality of outpatient bowel preparation for colonoscopy</p>
			<p><b>Investigators</b>: Robert Enns, MD, FRCPC; Oliver Takach, MSc. The University of British Columbia, Department of Medicine, Division of Gastroenterology.</p>
			<p><b>Purpose of this study</b>: This study aims to evaluate the effectiveness of an interactive web-based instructions vs. traditional phone/letter instructions in patients who will have a colonoscopy.</p>
			<p><b>Benefits of this study:</b> You will have access to online instructions that will go over why bowel preparations are important, and how to best prepare for the colonoscopy procedure. You may find this online tool simpler to understand and more organized.</p>
			<p><b>Possible risks/harms of this study:</b> We do not anticipate any direct risks/harms as a result of participating in this study, but you may still experience common side effects of bowel preparation products. Although the goal of this study is to improve how we communicate instructions to you, there is the possibility we do not meet this goal: there is a risk that you would receive a poorer instruction quality on how to prepare for your colonoscopy.<p>
			<p><b>What the study involves:</b> You will be asked to login to the website with the online instructions. We will track which parts of the website you view. We will analyze this data to see if how you use the website is related to how clean your bowel is. If our records show you have not viewed the website 1 week before your appointment, we will automatically email you a reminder to use the website.</p>
			<p>Your identity will be strictly private - we will not store your name or IP address on the website. You will be asked to complete an online questionnaire after the colonoscopy. Your response will be kept confidential and stored in a way that protects (anonymizes) your personal identity.</p>
			<p><b>Participation:</b> Your participation in this study is voluntary, and you may withdraw from it at any time. If you withdraw from the study, there will be no penalty or loss of benefits to which you are otherwise entitled, and your future medical care should not be affected. You do not have to answer any question that you are uncomfortable answering.</p>
			<p><b>Contact:</b> If you have any additional questions about this study, please contact Oliver Takach at 604-806-9440 or oliver.takach@gmail.com</p>
		</div>
</body>
</html>
