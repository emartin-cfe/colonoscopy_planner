	</div>

	<div id="bottom_nav">
		<div id="left_button">
			<button type="button" class="btn btn-default btn-lg" <?=isset($previous_page) ? "onclick=\"window.location='" . htmlspecialchars($previous_page) . "'\"" : 'disabled';?>>
			<span class="glyphicon glyphicon-chevron-left"></span>
			Previous page
			</button>
		</div>

		<div id="page_number"> <?=htmlspecialchars($page_num)."/".htmlspecialchars($total_pages);?></div>

		<div id="right_button">
			<button type="button" class="btn btn-default btn-lg" <?=isset($next_page) ? "onclick=\"window.location='" . htmlspecialchars($next_page) . "'\"" : 'disabled';?>>
			Next page
			<span class="glyphicon glyphicon-chevron-right"></span></button>
		</div>
	</div>

	<div id="footer_divider"></div>
	<div id="footer"><?=htmlspecialchars($section_name)." | Page ".htmlspecialchars($page_num); ?></div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="magnific-popup/jquery.magnific-popup.js"></script>
<script src="magnific-popup/CUSTOM_CODE/my_code.js"></script>

</body>
</html>
