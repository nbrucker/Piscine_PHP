<?php
function ft_split($text)
{
	$array = array_filter(explode(' ', $text));
	sort($array);
	return $array;
}
?>