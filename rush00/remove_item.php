<?php include('database.php') ?>
<?php
if (!isset($_POST['object']) || !isset($_POST['password']))
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
$name = mysqli_real_escape_string($db, $_POST['object']);
mysqli_query($db, "DELETE FROM items WHERE name = '$name'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Supprimer</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="cart_box">
		<span class="empty_cart"><?php echo $_POST['object'] ?> supprimé avec succes !</span>
	</div>
</body>
</html>