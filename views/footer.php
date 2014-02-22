	</div>


	<div class="bottom_nav">

		<div id="left_button">
			<button type="button" class="btn btn-default btn-lg" <?=isset($previous_page) ? "onclick=\"window.location='" . htmlspecialchars($previous_page) . "'\"" : 'disabled';?>>
			<span class="glyphicon glyphicon-chevron-left"></span>
			Previous page
			</button>
		</div>

		<div id="progress_bar">
			<input type="text" value="<?=htmlspecialchars(round($page_num/$total_pages*100));?>" class="dial" data-readOnly=true data-width="50" data-fgColor="#0D7FDB;">
			<script>$(function() {$(".dial").knob({'min':0,'max':100,});});</script>
		</div>

		<div id="right_button">
			<button type="button" class="btn btn-default btn-lg" <?=isset($next_page) ? "onclick=\"window.location='" . htmlspecialchars($next_page) . "'\"" : 'disabled';?>>
			Next page
			<span class="glyphicon glyphicon-chevron-right"></span></button>
		</div>
	</div>

	<div id="footer_divider"></div>
	<div id="footer"><?=htmlspecialchars($section_name)." | Page ".htmlspecialchars($page_num); ?></div>
</div>

<script src="magnific-popup/jquery.magnific-popup.js"></script>
<script src="magnific-popup/CUSTOM_CODE/my_code.js"></script>

</body>
</html>
