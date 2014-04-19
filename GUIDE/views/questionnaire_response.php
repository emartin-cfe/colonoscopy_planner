<h2>Follow each of these instructions</h2>

<?php

		$counter = 1;

		if (isset($fish_oil)) {
			print "<div class='alert alert-danger'>";
			print "<p><b>$counter) Drugs that need to be modified</b></p>";
			print "<ul>";
			if(isset($fish_oil)) { print "<li>STOP taking fish oil 2 days before your colonoscopy</li>"; }
			print "</ul>";
			print "</div>";
			$counter++;
			}

		if (isset($diabetes) || isset($anti_platelet) || isset($blood_thinner)) {
			print "<div class='alert alert-warning'>";
			print "<p><b>$counter) Drugs you need to call us about</b></p>";
			print "<ul>";
			if(isset($diabetes)) { print "<li>Diabetes drugs (Metformin, Actos, Byetta)</li>"; }
			if(isset($anti_platelet)) { print "<li>Anti-platelet drugs (Plavix)</li>"; }
			if(isset($blood_thinner)) { print "<li>Blood-thinners (Warfarin, Coumadin)</li>"; }
			print "</ul>";
			print "<br/>";
			print "<p>Call us at <b>(604) 688-6332, extension 222</b> if you are taking these drugs.</p>";
			print "</div>";
			$counter++;
			}

		if (isset($blood_pressure) || isset($advil)) {
			print "<div class='alert alert-success'>";
			print "<p><b>$counter) Drugs you can keep taking normally</b></p>";

			print "<ul>";
			if(isset($blood_pressure)) { print "<li>Your blood pressure medicine</li>"; }
			if (isset($advil)) { print "<li>Advil, aspirin, or ibuprofen</li>"; }
			print "</ul>";
			print "</div>";
			}
		
?>
