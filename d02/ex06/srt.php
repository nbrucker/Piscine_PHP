#!/usr/bin/php
<?php
if ($argc != 2 || !file_exists($argv[1]))
	exit;
$f = fopen($argv[1], "r");
$nb = [];
$time = [];
$word = [];
while ($f && !feof($f))
{
	$line = fgets($f);
	$line = str_replace("\n", "", $line);
	$nb[] = $line;
	$line = fgets($f);
	$line = str_replace("\n", "", $line);
	$time[] = $line;
	$line = fgets($f);
	$line = str_replace("\n", "", $line);
	$word[] = $line;
	$line = fgets($f);
}
foreach ($time as $i => $el)
{
	$j = 0;
	while ($j < $i)
	{
		if ($time[$i] < $time[$j])
		{
			$save = $time[$i];
			$time[$i] = $time[$j];
			$time[$j] = $save;
			$save = $word[$i];
			$word[$i] = $word[$j];
			$word[$j] = $save;
		}
		$j++;
	}
}
fclose($f);
foreach ($nb as $i => $el)
{
	if ($i != 0)
		echo "\n";
	echo $el."\n";
	echo $time[$i]."\n";
	echo $word[$i]."\n";
}
?>