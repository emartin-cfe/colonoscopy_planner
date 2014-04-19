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

		<form id="form" name="form" method="post" action="questionnaire_response.php?auth=<?=$sha1?>">
			<ul class="hidden_bullets">
				<li><input type="checkbox" name="fish_oil" value="checked" form="form"> Fish oil</li>
				<li><input type="checkbox" name="diabetes" value="checked" form="form"> Diabetes medicine (Metformin, Actos, Byetta...)</li>
				<li><input type="checkbox" name="anti_platelet" value="checked" form="form"> Anti-platelet drugs (Plavix)</li>
				<li><input type="checkbox" name="blood_thinner" value="checked" form="form"> Blood thinners (Warfarin, Coumadin...)</li>
				<li><input type="checkbox" name="blood_pressure" value="checked" form="form"> Blood pressure medicine</li>
 				<li><input type="checkbox" name="advil" value="checked" form="form"> Advil, Ibuprofen, Aspirin</li>
			</ul>
		</form>

		</p>

		<br/>

		<div class="alert alert-info">
			<p>Telling us what you take helps us make your procedure smoother and safer. Please take your time and try to be as accurate as possible.</p>
		</div>

		<br/>
