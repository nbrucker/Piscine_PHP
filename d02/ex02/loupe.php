#!/usr/bin/php
<?php
function to_up2($el)
{
	return ($el[1].strtoupper($el[2]).$el[3]);
}
function to_up($el)
{
	$el[0] = preg_replace_callback("/( title=[\"'])(.*?)([\"'])/si", "to_up2", $el[0]);
	$el[0] = preg_replace_callback("/(>)(.*?)(<)/si", "to_up2", $el[0]);
	return ($el[0]);
}
if ($argc != 2 || !file_exists($argv[1]))
	exit;
$file = file_get_contents($argv[1]);
$file = preg_replace_callback("/(<a[ >])(.*?)(<\/a>)/si", "to_up", $file);
echo $file;
?>