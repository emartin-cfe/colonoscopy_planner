	</div>


	<div class="bottom_nav">

		<div id="left_button">
			<button type="button" class="btn btn-default btn-lg" <?=isset($previous_page) ? "onclick=\"window.location='" . htmlspecialchars($previous_page) . "'\"" : 'disabled';?>>
			<span class="glyphicon glyphicon-chevron-left"></span>
			Previous page
			</button>
		</div>

		<div id="progress_bar">
			<?php

			if(isset($page_num)) { print "Step " . htmlspecialchars($page_num) . " of " . htmlspecialchars($total_pages) . "\n"; }
			else { print "You're done!"; }
			?>
		</div>

		<?php

		if (isset($next_page)) {
			echo 	"<div id='right_button'>\n" .
					"\t\t\t<button type='button' class='btn btn-default btn-lg' onclick='" . $nav_conditions . "window.location=\"$next_page\";'>\n" .
					"\t\t\tNext page\n" .
					"\t\t\t<span class='glyphicon glyphicon-chevron-right'></span></button>\n" .
					"\t\t</div>\n";
			}
		?>

	</div>

	<div id="footer_divider"></div>
	<div id="footer"><?=htmlspecialchars($section_name); ?></div>
</div>

<script src="magnific-popup/jquery.magnific-popup.js"></script>
<script src="magnific-popup/CUSTOM_CODE/my_code.js"></script>

</body>
</html>
