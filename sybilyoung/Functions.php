<?php
function printDate(){
	date_default_timezone_set("America/New_York");
	echo "Today is " . date("Y/m/d") . "<br>";
	echo "The time is " . date("h:i:sa");
}

?>