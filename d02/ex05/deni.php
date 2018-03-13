#!/usr/bin/php
<?php
if ($argc != 3 || !file_exists($argv[1]))
	exit;
$f = fopen($argv[1], "r");
$line = fgets($f);
$line = str_replace("\n", "", $line);
$option = explode(";", $line);
$i = 0;
foreach ($option as $el)
{
	$n = 0;
	foreach ($option as $two)
	{
		if ($two == $el)
			$n++;
	}
	if ($n != 1)
		exit;
	if ($el == $argv[2])
		$i++;
}
if ($i != 1)
	exit;
while ($f && !feof($f))
{
	$line = fgets($f);
	$line = str_replace("\n", "", $line);
	$array = explode(";", $line);
	if (count($array) != count($option))
		continue;
	foreach ($option as $i => $el)
		${$el}[$array[array_search($argv[2], $option)]] = $array[$i];
}
fclose($f);
while (STDIN && !feof(STDIN))
{
	echo "Entrez votre commande: ";
	$command = fgets(STDIN);
	if ($command)
		eval($command);
}
echo "\n";
?>