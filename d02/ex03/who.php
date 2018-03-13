#!/usr/bin/php
<?php
function padding_hour($text, $array)
{
	$i = strlen($text);
	$max = 0;
	foreach ($array as $el)
	{
		if (strlen(date("j H:i", $el['time'])) > $max)
			$max = strlen(date("j H:i", $el['time']));
	}
	while ($i < $max)
	{
		echo " ";
		$i++;
	}
	echo $text."\n";
}
function padding($text, $array, $key)
{
	$i = strlen($text);
	$max = 0;
	foreach ($array as $el)
	{
		if (strlen($el[$key]) > $max)
			$max = strlen($el[$key]);
	}
	$max++;
	echo $text;
	while ($i < $max)
	{
		echo " ";
		$i++;
	}
}
$file = file_get_contents("/var/run/utmpx");
date_default_timezone_set('Europe/Paris');
$type = "A256user/A4id/A32tty/ipid/itype/ltime/lother/A256host/A64pad";
$array = [];
while ($file)
{
	$str = unpack($type, $file);
	if ($str['type'] == 7)
		$array[] = $str;
	$file = substr($file, 628);
}
foreach ($array as $i => $el)
{
	$j = 0;
	while ($j < $i)
	{
		if ($array[$j]['time'] > $array[$i]['time'])
		{
			$tmp = $array[$j];
			$array[$j] = $array[$i];
			$array[$i] = $tmp;
		}
		$j++;
	}
}
foreach ($array as $el)
{
	$mon = date("F", $el['time']);
	$mon = substr($mon, 0, 3);
	padding($el['user'], $array, 'user');
	padding($el['tty'], $array, 'tty');
	echo " ".$mon." ";
	padding_hour(date("j H:i", $el['time']), $array);
}
?>