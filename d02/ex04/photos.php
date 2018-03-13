#!/usr/bin/php
<?php
function name($el)
{
	return ($el[3]);
}
function dl_image($src, $path)
{
	$name = substr($src, strrpos($src, '/') + 1);
	$save = $path."/".$name;
	$ch = curl_init($src);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	$raw = curl_exec($ch);
	curl_close($ch);
	if (file_exists($save))
		unlink($save);
	$fp = fopen($save, 'x');
	fwrite($fp, $raw);
	fclose($fp);
}
if ($argc != 2)
	exit;
$name = "";
$name = preg_replace_callback("/(http(s?):\/\/)(.+)/si", "name", $argv[1]);
if ($name == "")
	exit;
$ch = curl_init($argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
if ($content == "")
	exit;
if (file_exists($name) && !is_dir($name))
	unlink($name);
if (!file_exists($name))
	mkdir($name);
preg_match_all("/<img[^>]+>/si", $content, $array);
foreach ($array[0] as $el)
{
	preg_match_all("/(src=\")(.+?)(\")/si", $el, $link);
	$text = $link[2][0];
	if (substr($text, 0, 7) != "http://" && substr($text, 0, 8) != "https://")
		$text = $argv[1]."/".$text;
	dl_image($text, $name);
}
?>