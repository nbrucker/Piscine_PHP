<?php
$servername = "localhost";
$username = "root";
$password = "root";
try
{
	$db = mysqli_connect($servername, $username, $password, 'shop');
}
catch (Exception $e)
{
	echo "Error\n";
	exit;
}
session_start();
if (!isset($_SESSION['cart']))
	$_SESSION['cart'] = [];
if (!isset($_SESSION['user']))
	$_SESSION['user'] = "";
date_default_timezone_set("Europe/Paris");
?>
