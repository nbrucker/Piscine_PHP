#!/usr/bin/php
<?php
function ft_split($text)
{
	$array = array_filter(explode(' ', $text));
	sort($array);
	return $array;
}
$text = "";
for ($x = 1; $x < $argc; $x++)
	$text .= $argv[$x]." ";
$array = ft_split($text);
foreach ($array as $el)
	echo $el."\n";
?>