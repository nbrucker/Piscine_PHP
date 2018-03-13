<?php
function ft_is_sort($array)
{
	$sort = $array;
	sort($sort);
	if ($array == $sort)
		return true;
	return false;
}
?>