<?php include('database.php'); ?>
<?php
if (isset($_GET['name']))
{
	$name = mysqli_real_escape_string($db, $_GET['name']);
	$req = mysqli_query($db, "SELECT id FROM items WHERE name = '$name'");
	if (mysqli_num_rows($req) > 0)
		$_SESSION['cart'][$_GET['name']]--;
}
header('Location: cart.php');
exit;
?>
