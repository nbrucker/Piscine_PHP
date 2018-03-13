#!/usr/bin/php
<?php
if ($argc >= 3)
{
	$val = "";
	for ($i = 2; $i < $argc; $i++)
	{
		$array = explode(":", $argv[$i], 2);
		if ($argv[1] === $array[0])
			$val = $array[1];
	}
	if ($val != "")
		echo $val."\n";
}
?>