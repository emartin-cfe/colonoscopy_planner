		<h2 class="top">Instructions for <?=$appointment_date?></h2>

		<h2>What you eat:</h2>
		<p>You <b>must not</b> eat any <span class="image_popup"><a class="image_popup" href="images/foods_not_ok.png" title="Solid food makes it hard for the GI doctor to see inside.">solid foods</a> the day before your colonoscopy.</p>

		<h2>What you drink:</h2>
		<p>You <b>must</b> drink only <span class="image_popup"><a class="image_popup" href="images/drinks_ok.png" title="Do NOT drink cloudy liquids: it will make it hard for the GI doctor to see inside.">clear liquids</a></span> for breakfast, lunch, and dinner. Drink 12 full cups of clear liquids throughout the day in addition to your <?=$bowel_prep?>.</p>

		<h2>Taking your bowel prep:</h2>
		<p>You should already have your "bowel prep" (<i><?=$bowel_prep?></i>). If not, call your doctor. The instructions are inside the prep box.
			<?php
				if($bowel_prep == "PicoSalax") { print "<b>Take the first part of your prep at 1:00 p.m. and the second part of your prep at 6:00 p.m.</b>"; }
				if($bowel_prep == "Moviprep") { print "<b>Take the first part of your prep at 6:00 p.m.</b>"; }
			?>
		</p>

		<br/>

		<div class="alert alert-info">
			<ul>
				<li>Dissolve <?=$bowel_prep?> in the morning and chill in the fridge: it tastes better.</li>
				<li>If you feel cramping and bloating, slow down your drinking.</li>
				<li>Use a straw while you drink the <?=$bowel_prep?>.</li>
			</ul>
		</div>
