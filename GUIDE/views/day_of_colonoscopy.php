		<h2><?=$appointment_day?>: <span class="red">the day of</span> your colonoscopy</h2>

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
            <td class="time_of_day"><?=$preparation_time?><img src="images/morning.png"/></td>
            <td class="what_you_eat"><span class="title">Take <?=$bowel_prep?></span><br/>* Clear liquids<br/>* No solid food<br/><img class="no_foods"src="images/no_solid_foods.png"/></td>
            <td class="what_you_drink">* Drink 2 tall glasses of clear liquids<br/><img class="two_glasses" src="images/two_glasses.png"/></td>
            </tr>

            <tr>
            <td class="time_of_day"><?=$appointment_time?><img src="images/afternoon.png"/></td>
            <td class="what_you_eat"><div class='table_highlight'>Arrive for your colonoscopy</div>After colonoscopy, eat a regular meal.</td>
            <td class="what_you_drink">Done! No more restrictions on what you can drink.</td>
            </tr>

        </tbody>
    </table>
