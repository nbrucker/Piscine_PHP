#!/usr/bin/php
<?php
function ft_strcmp($s1, $s2)
{
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);
	$str = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$i = 0;
	while ($i < strlen($s1) && $i < strlen($s2) && $s1[$i] == $s2[$i])
		$i++;
	if ($i == strlen($s1) && $i == strlen($s2))
		return (0);
	if ($i == strlen($s1))
		return (-1);
	if ($i == strlen($s2))
		return (1);
	return (strrpos($str, $s1[$i]) - strrpos($str, $s2[$i]));
}
if ($argc >= 2)
{
	$text = "";
	for ($x = 1; $x < $argc; $x++)
		$text .= $argv[$x]." ";
	$array = array_filter(explode(' ', $text));
	foreach ($array as $i => $parent)
	{
		$j = 0;
		while ($j < $i)
		{
			if (ft_strcmp($parent, $array[$j]) < 0)
			{
				$tmp = $array[$i];
				$array[$i] = $array[$j];
				$array[$j] = $tmp;
			}
			$j++;
		}
	}
	foreach ($array as $el)
	{
		echo $el."\n";
	}
}
?>