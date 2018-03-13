<?php include('database.php'); ?>
<?php
if ($_SESSION['user'] == '')
{
	header('Location: index.php');
	exit;
}
if (isset($_POST['login']) && isset($_POST['password']) && $_POST['login'] != "" && $_POST['password'] != "")
{
	$hash = mysqli_real_escape_string($db, $_POST['password']);
	$hash = hash('whirlpool', $hash);
	$login = mysqli_real_escape_string($db, $_POST['login']);
	$req = mysqli_query($db, "SELECT id FROM users WHERE login = '$login' AND password = '$hash'");
	if (mysqli_num_rows($req) > 0)
	{
		mysqli_query($db, "DELETE FROM users WHERE login = '$login' AND password = '$hash'");
		header('Location: logout.php');
		exit;
	}
	echo "<style>#wrong_log_pass { display: block; } </style>";
}
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
	<?php include('header.php') ?>
	<div class="login_box">
		<span id="wrong_log_pass" class="error_msg">Mauvais nom d'utilisateur/mot de passe</span>
		<form action="delete.php" method="post">
			<input class="login" type="text" name="login" placeholder="Nom d'utilisateur" required />
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<input class="submit" type="submit" value="Supprimer" />
		</form>
	</div>
</body>
</html>
