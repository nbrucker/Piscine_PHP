#!/usr/bin/php
<?php
if ($argc == 2)
{
	$array = array_filter(explode(' ', $argv[1]));
	$text = "";
	foreach ($array as $el)
		$text .= $el." ";
	echo substr($text, 0, -1)."\n";
}
?>