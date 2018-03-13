#!/usr/bin/php
<?php
if ($argc >= 2)
{
	$array = array_filter(explode(' ', $argv[1]));
	$text = "";
	$word = $array[0];
	unset($array[0]);
	foreach ($array as $el)
		$text .= $el." ";
	$text .= $array[0];
	echo $text.$word."\n";
}
?>