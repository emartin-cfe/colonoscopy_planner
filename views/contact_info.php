		<h2>Contact information</h2>

		<p>We are always happy to answer your questions! Please feel free to give us a call if you have any questions about your colonoscopy preparation.</p>

		<div class="alert alert-info">
			<p class="large"><b>GI doctor contact information</b></p>
			<ul><? foreach ($contacts as $contact) { echo "\n\t\t\t\t<li>" . htmlspecialchars($contact) . "</li>"; } ?>
			</ul>
			<p>For emergencies, dial 911.</p>
		</div>
