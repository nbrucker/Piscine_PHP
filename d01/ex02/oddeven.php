#!/usr/bin/php
<?php
while (STDIN && !feof(STDIN))
{
	echo "Entrez un nombre: ";
	$nb = fgets(STDIN);
	if ($nb)
	{
		$nb = substr($nb, 0, -1);
		if (is_numeric($nb))
		{
			if ($nb % 2 == 0)
				echo "Le chiffre ".$nb." est Pair\n";
			else
				echo "Le chiffre ".$nb." est Impair\n";
		}
		else
			echo "'".$nb."' n'est pas un chiffre\n";
	}
}
echo "\n";
?>