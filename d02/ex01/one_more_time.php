#!/usr/bin/php
<?php
if ($argc <= 1)
	exit;
$argv[1] = strtolower($argv[1]);
$array = array_filter(explode(" ", $argv[1]));
if (count($array) != 5)
{
	echo "Wrong Format\n";
	exit;
}
$day = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
$month = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"];
$day_en = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
$month_en = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
if (!in_array($array[0], $day) || !in_array($array[2], $month))
{
	echo "Wrong Format\n";
	exit;
}
if (!is_numeric($array[1]) || !is_numeric($array[3]))
{
	echo "Wrong Format\n";
	exit;
}
$hour = array_filter(explode(":", $array[4]));
if (count($hour) != 3 || !is_numeric($hour[0]) || !is_numeric($hour[1]) || !is_numeric($hour[2]))
{
	echo "Wrong Format\n";
	exit;
}
date_default_timezone_set('Europe/Paris'); 
$time = mktime($hour[0], $hour[1], $hour[2], array_search($array[2], $month) + 1, $array[1], $array[3]);
$date = array_filter(explode(" ", date("l j F Y H:i:s", $time)));
if (count($date) != 5)
	echo "Wrong Format\n";
else if (array_search($array[0], $day) != array_search($date[0], $day_en))
	echo "Wrong Format\n";
else if ($array[1] != $date[1])
	echo "Wrong Format\n";
else if (array_search($array[2], $month) != array_search($date[2], $month_en))
	echo "Wrong Format\n";
else if ($array[3] != $date[3])
	echo "Wrong Format\n";
else if ($array[4] != $date[4])
	echo "Wrong Format\n";
else
	echo $time."\n";
?>