		<script>
			document.checklist_printed = false;
		</script>

		<br/>

		<div class="print_legend">
			<p>Please print this checklist and use it as your colonoscopy planner.</p>

			<button id="print_me" type="button" class="btn btn-default btn-lg" onclick="window.print(); document.checklist_printed = true;">
				<span class="glyphicon glyphicon-print"></span> Print checklist!
			</button>
		</div>

		<h2>Before <?=$date_before_appointment?></h2>
		<ul class="hidden_bullets">
			<li><input type="checkbox"> Make sure you have purchased your <?=$bowel_prep?>.</li>
			<li><input type="checkbox"> If you take fish oil, STOP taking it by <?=$date_fish_oil?></li>
			<li><input type="checkbox"> If you take blood thinners, ask your doctor for instructions.</li>
		</ul>

		<br/>

		<h2><?=$date_before_appointment?></h2>
		<ul class="hidden_bullets">
			<li><input type="checkbox"> Breakfast - 4 cups of clear liquids, no solid food.</li>
			<li><input type="checkbox"> Lunch - 4 cups of clear liquids, no solid food.</li>
			<li><input type="checkbox"> Dinner - 4 cups of clear liquids, no solid food.</li>

			<?php

			if ($bowel_prep == "Moviprep") {
				print 	"<li><input type='checkbox'> 6:00 PM: Take the <b>first part</b> of your $bowel_prep.</li>" .
						"<li><input type='checkbox'> After 6:00 PM: be near a toilet, expect bloating and nausea.</li>";
				}

			if ($bowel_prep == "PicoSalax") {
				print   "<li><input type='checkbox'> 1:00 PM: Take the <b>first part</b> of your $bowel_prep.</li>" .
						"<li><input type='checkbox'> 5:00 PM: Take the <b>second</b> $bowel_prep + 2 Dulcolax tablets.</li>" .
						"<li><input type='checkbox'> After 5:00 PM: be near a toilet, expect bloating and nausea.</li>";
				}

			?>
		</ul>

		<br/>

		<h2><?=$date_of_appointment?></h2>
		<ul class="hidden_bullets">
			<li><input type="checkbox">Breakfast - 2 cups of clear liquids, no solid food.</li>
			<?php if($bowel_prep == "Moviprep") { print "<li><input type='checkbox'> $preparation_time: Take the <b>second part</b> of your $bowel_prep.</li>"; } ?>
			<li><input type="checkbox"> <?=$appointment_time?>: Report for your colonoscopy.</li>
			<li><input type="checkbox"> <?=$pickup_time?>: Have someone drive you home.</li>
			<li><input type="checkbox"> After <?=$pickup_time?>: If you take diabetic medicine, resume taking them.</li>
		</ul>
