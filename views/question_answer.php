		<link rel="stylesheet" type="text/css" href="css/questions.css">

		<h1 class="question"><?=htmlspecialchars($question)?></h1>


		<img id="question_image_1" class="question_image_1" src="images/<?=htmlspecialchars($image_1)?>" height="<?=htmlspecialchars($height_1)?>" width="<?=htmlspecialchars($width_1)?>">
		<img id="question_image_2" class="question_image_2" src="images/<?=htmlspecialchars($image_2)?>" height="<?=htmlspecialchars($height_2)?>" width="<?=htmlspecialchars($width_2)?>">

		<div class="question_warning" id="question_warning">
			<div class="alert alert-<?=$notify_type?>">
				<p class="question_warning"><?=htmlspecialchars($question_warning)?></p>
			</div>
		</div>

	</div>


	<div class="question_interface" id="yes_no_questions">

        	<button id="question_back" type="button" class="btn btn-default btn-lg" <?=isset($previous_page) ? "onclick=\"window.location='" . htmlspecialchars($previous_page) . "'\"" : 'disabled';?>>
        	<span class="glyphicon glyphicon-chevron-left"></span></button>

		<button type="button" class="btn btn-default btn-lg" onclick="document.getElementById('question_warning').style.display = 'block'; document.getElementById('yes_no_questions').style.display = 'none'; document.getElementById('proceed').style.display = 'block'; document.getElementById('question_image_1').style.display = 'none'; document.getElementById('question_image_2').style.display = 'block';">Yes <span id="green" class="glyphicon glyphicon-ok"></span></button>
		
		<button type="button" class="btn btn-default btn-lg" onclick="window.location='<?=htmlspecialchars($next_page_yes)?>';">No <span id="red" class="glyphicon glyphicon-remove"></span></button>

        	<button id="question_forward" type="button" class="btn btn-default btn-lg" <?=isset($next_page_yes) ? "onclick=\"window.location='" . htmlspecialchars($next_page_yes) . "'\"" : 'disabled';?>>
        	<span class="glyphicon glyphicon-chevron-right"></span></button>

	</div>

	<div class="proceed" id="proceed">
		<div>
			<button id="proceed_back" type="button" class="btn btn-default btn-lg" onclick="window.location='<?=htmlspecialchars($previous_page)?>';">
			<span class="glyphicon glyphicon-chevron-left"></span>
			Previous page</button>
		</div>

		<div id="yes_button">
			<button id="proceed_forward" type="button" class="btn btn-default btn-lg" onclick="window.location='<?=htmlspecialchars($next_page_no)?>';">
			Next page
			<span class="glyphicon glyphicon-chevron-right"></span></button>
		</div>
	</div>

	<div id="footer_divider"></div>
	<div id="footer"><?=htmlspecialchars($section_name)?></div>
</div>

<script src="magnific-popup/jquery.magnific-popup.js"></script>
<script src="magnific-popup/CUSTOM_CODE/my_code.js"></script>

</body>
</html>
