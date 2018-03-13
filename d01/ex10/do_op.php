#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
}
else
{
	$c = '';
	$one = trim($argv[1]);
	$two = trim($argv[3]);
	$op = trim($argv[2]);
	if ($op == "+")
		echo $one + $two."\n";
	else if ($op == "-")
		echo $one - $two."\n";
	else if ($op == "*")
		echo $one * $two."\n";
	else if ($op == "/")
		echo $one / $two."\n";
	else if ($op == "%")
		echo $one % $two."\n";
}
?>