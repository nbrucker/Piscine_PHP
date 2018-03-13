<?php include('database.php') ?>
<?php
if (!isset($_POST['object']) || !isset($_POST['password']) || !isset($_POST['name']) || !isset($_POST['prix']) || !isset($_POST['type']))
{
	header('Location: index.php');
	exit;
}
$login = mysqli_real_escape_string($db, $_SESSION['user']);
$req = mysqli_query($db, "SELECT type, password FROM users WHERE login = '$login'");
$el = mysqli_fetch_array($req, MYSQLI_ASSOC);
if ($el['type'] != "admin")
{
	header('Location: index.php');
	exit;
}
$hash = mysqli_real_escape_string($db, $_POST['password']);
$hash = hash('whirlpool', $hash);
if ($hash != $el['password'])
{
	header('Location: index.php');
	exit;
}
$object = mysqli_real_escape_string($db, $_POST['object']);
$type = mysqli_real_escape_string($db, $_POST['type']);
$name = mysqli_real_escape_string($db, $_POST['name']);
$prix = mysqli_real_escape_string($db, $_POST['prix']);
$x = 0;
if ($type != "")
	mysqli_query($db, "UPDATE items SET type = '$type' WHERE name = '$object'");
if ($prix != "")
	mysqli_query($db, "UPDATE items SET prix = '$prix' WHERE name = '$object'");
if ($name != "")
{
	$req = mysqli_query($db, "SELECT id FROM items WHERE name = '$name'");
	if (mysqli_num_rows($req) == 0)
		mysqli_query($db, "UPDATE items SET name = '$name' WHERE name = '$object'");
	else if ($name != $object)
		$x = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ajouter</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="cart_box">
		<?php
		if ($x == 0)
		{
			?>
			<span class="empty_cart"><?php echo $_POST['object'] ?> modifié avec succes !</span>
			<?php
		}
		else
		{
			?>
			<span class="empty_cart">Un article de ce nom existe déjà</span>
			<?php
		}
		?>
	</div>
</body>
</html>