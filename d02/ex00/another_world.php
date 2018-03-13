#!/usr/bin/php
<?php
if ($argc < 2)
	exit;
$text = $argv[1];
$text = trim($text);
$text = preg_replace("/[ \t]+/", " ", $text);
echo $text."\n";
?>