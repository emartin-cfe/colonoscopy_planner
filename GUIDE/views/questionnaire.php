		<style>
input[type=checkbox] {
 width: 19px; height: 19px;
 -webkit-border-radius: 14px; -moz-border-radius: 14px; border-radius: 14px;
 border: 1px solid #bbb;
}

ul.hidden_bullets {
	font-family:"Helvetica", serif;
	font-size:100%;
	}
ul.hidden_bullets li {
	margin-bottom:12px;
	}

/* Mobile friendly checkbox in lists */
@media only screen and (max-device-width: 480px) {
	ul.hidden_bullets {
		font-size:160%;
		}
	ul.hidden_bullets li {
		margin-bottom:20px;
		}

	input[type=checkbox] {
		width: 30px; height: 30px;
		-webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px;
		border: 1px solid #bbb;
		}
}

		</style>

		<h2>Do you take any of the following medicine?</h2>

		<br/>

		<p>If you take any medicine from the following list, please <b>select the checkbox representing each drug you take:</b></p>

		<p>

		<?php
			if(isset($sha1)) { print "<form id='form' name='form' method='post' action='questionnaire_response.php?auth=$sha1'>"; }
			else { print "<form id='form' name='form' method='post' action='questionnaire_response.php'>"; }
		?>

			<ul class="hidden_bullets">
				<li><input type="checkbox" id="fish_oil" name="fish_oil"> Fish oil</li>
				<li><input type="checkbox" id="diabetes" name="diabetes"> Diabetes medicine (Metformin, Actos, Byetta...)</li>
				<li><input type="checkbox" id="anti_platelet" name="anti_platelet"> Anti-platelet drugs (Plavix)</li>
				<li><input type="checkbox" id="blood_thinner" name="blood_thinner"> Blood thinners (Warfarin, Coumadin...)</li>
				<li><input type="checkbox" id="blood_pressure" name="blood_pressure"> Blood pressure medicine</li>
 				<li><input type="checkbox" id="advil" name="advil"> Advil, Ibuprofen, Aspirin</li>
				<li><input type="checkbox" id="no_drugs" name="no_drugs"><b> I do not take any of these drugs</b></li>
			</ul>
		</form>

		</p>

		<br/>

		<div class="alert alert-info">
			<p>Telling us what you take helps us make your procedure smoother and safer. Please take your time and try to be as accurate as possible.</p>
		</div>

		<br/>
