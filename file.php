
<?php
	function make_calendar($month, $year) {
				
		$first_day = mktime(0, 0, 0, $month, 1, $year);

		$days_in_month = date("t", $first_day);
		$month = date("m", $first_day);
		$month_name = date("F", $first_day);
		$year = date("Y", $first_day);
		$week_day = date("w", $first_day);
     	$week_day = ($week_day + 7) % 7;
         
		 $curr_date = date("d");
		 $curr_month = date("m");
		 $curr_year = date("Y");
					 
		$calendar = "<table><caption>$month_name $year</caption><tr>";

		$day_names = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
		foreach ($day_names as $d) $calendar .= "<th>$d</th>";
    		$calendar .= "</tr><tr>";
        if ($week_day > 0) $calendar .= "<td colspan=\"$week_day\"> </td>";

		for ($day = 1; $day <= $days_in_month; ++$day, ++$week_day) {
			if ($week_day == 7) {
				$week_day = 0;
				$calendar .= "</tr><tr>";
			}
             if($month == $curr_month && $year == $curr_year && $day == $curr_date)
             {
			   $calendar .= "<td style='background-color:red'>$day</td>";
		     }
			 else
			$calendar .= "<td>$day</td>";
		}

		if ($week_day != 7) $calendar .= "<td colspan=\"" . (7 - $week_day) . "\"> </td>";

		$calendar .= "</tr></table>";
		return $calendar;
	}
     echo "<h1>CALENDAR 2018</h1>";
	echo "<table><tr>";
	for ($i = 1; $i < 13; ++$i) {
		echo "<td>" . make_calendar($i, 2018) . "</td>";
		if ($i % 4 == 0) echo "</tr> <tr>";
	}
	echo "</tr></table>";
?>
