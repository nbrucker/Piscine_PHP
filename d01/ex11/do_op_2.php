#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
}
else
{
	$text = str_replace(' ', '', $argv[1]);
	$one = intval($text);
	$text = substr($text, strlen((string)$one));
	$c = $text[0];
	$two = substr($text, 1);
	if (!is_numeric($one) || !is_numeric($two))
		echo "Syntax Error\n";
	else
	{
		if ($c == "+")
			echo $one + $two."\n";
		else if ($c == "-")
			echo $one - $two."\n";
		else if ($c == "*")
			echo $one * $two."\n";
		else if ($c == "/")
			echo $one / $two."\n";
		else if ($c == "%")
			echo $one % $two."\n";
		else
			echo "Syntax Error\n";
	}
}
?>