	<h2><?=$appointment_day?>: <span class="red">1 day before</span> your colonoscopy</h2>

	<link rel="stylesheet" type="text/css" href="css/calendar_table.css">

    <table id="schedule">
        <thead>
            <tr>
            <th scope="col" class="time_of_day"><?=$appointment_date?></th>
            <th scope="col" class="what_you_eat">What you eat</th>
            <th scope="col" class="what_you_drink">What you drink</th>
            </tr>
        </thead>

        <tbody>

            <tr>
            <td class="time_of_day">9:00 AM<img src="images/morning.png"/></td>
            <td class="what_you_eat">* Clear liquids<br/>* No solid food<br/><img class="no_foods"src="images/no_solid_foods.png"/><br/><span class="tip">Dissolve + chill prep</span></td>
            <td class="what_you_drink">* Drink 4 tall glasses of clear liquids<br/><img class="glasses" src="images/four_glasses.png"/></td>
            </tr>

            <tr>
            <td class="time_of_day">1:00 PM<img src="images/afternoon.png"/></td>
            <td class="what_you_eat"><?php if($afternoon_prep != "") { print "<span class='title'>$afternoon_prep</span><br/>"; }?>* Clear liquids<br/>* No solid food<br/><img class="no_foods" src="images/no_solid_foods.png"/></td>
            <td class="what_you_drink">* Drink 4 tall glasses of clear liquids<br/><img class="glasses" src="images/four_glasses.png"/></td>
            </tr>

            <tr>
            <td class="time_of_day"><?=$last_time?><img src="images/evening.png" height="100"/></td>
            <td class="what_you_eat"><span class="title">Take <?=$bowel_prep?></span><br/>* Clear liquids<br/>* No solid food<br/><img class="no_foods" src="images/no_solid_foods.png"/></td>
            <td class="what_you_drink">* Drink 4 tall glasses of clear liquids<br/><img class="glasses" src="images/four_glasses.png"/></td>
            </tr>

        </tbody>
    </table>
