#!/usr/bin/php
<?php
if ($argc != 2)
	exit;
$user = [];
$total = [];
$note = [];
$moulinette = [];
$all = [];
fgets(STDIN);
while (STDIN && !feof(STDIN))
{
	$line = fgets(STDIN);
	$line = str_replace("\n", "", $line);
	$array = explode(';', $line);
	if (count($array) == 4)
	{
		array_push($user, $array[0]);
		array_push($total, 0);
		array_push($note, 0);
		array_push($moulinette, 0);
		array_push($all, $array);
	}
}
sort($user);
if ($argv[1] === "moyenne")
{
	foreach ($all as $el)
	{
		if ($el[2] !== "moulinette" && $el[1] !== "")
		{
			$note[0] += $el[1];
			$total[0]++;
		}
	}
	if ($total[0] !== 0)
		echo ($note[0] / $total[0])."\n";
}
else if ($argv[1] === "moyenne_user")
{
	foreach ($all as $el)
	{
		if ($el[2] !== "moulinette" && $el[1] !== "")
		{
			$index = array_search($el[0], $user);
			$note[$index] += $el[1];
			$total[$index]++;
		}
	}
	foreach ($user as $i => $el)
		if ($total[$i] !== 0)
			echo $el.":".($note[$i] / $total[$i])."\n";
}
else if ($argv[1] === "ecart_moulinette")
{
	foreach ($all as $el)
	{
		if ($el[1] !== "")
		{
			$index = array_search($el[0], $user);
			if ($el[2] !== "moulinette")
			{
				$note[$index] += $el[1];
				$total[$index]++;
			}
			else
				$moulinette[$index] = $el[1];
		}
	}
	foreach ($user as $i => $el)
		if ($total[$i] !== 0)
			echo $el.":".($note[$i] / $total[$i] - $moulinette[$i])."\n";
}
?>