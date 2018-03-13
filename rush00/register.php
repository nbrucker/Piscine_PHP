<?php include('database.php'); ?>
<?php
if ($_SESSION['user'] != '')
{
	header('Location: index.php');
	exit;
}
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_conf']) && $_POST['login'] != "" && $_POST['password'] != "" && $_POST['password_conf'] != "")
{
	if ($_POST['password'] != $_POST['password_conf'])
		echo "<style>#pass_match { display: block; } </style>";
	else
	{
		$login = mysqli_real_escape_string($db, $_POST['login']);
		$req = mysqli_query($db, "SELECT id FROM users WHERE login = '$login'");
		if (mysqli_num_rows($req) > 0)
			echo "<style>#login_used { display: block; } </style>";
		else
		{
			$hash = mysqli_real_escape_string($db, $_POST['password']);
			$hash = hash('whirlpool', $hash);
			$date = time();
			mysqli_query($db, "INSERT INTO users (login, password, creation, type) VALUES ('$login', '$hash', '$date', 'user')");
			$_SESSION['user'] = $login;
			header('Location: index.php');
			exit;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Création</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="login_box">
		<span id="login_used" class="error_msg">Ce nom d'utilisateur est déjà utilisé</span>
		<span id="pass_match" class="error_msg">Les deux mots de passe ne correspondent pas</span>
		<form action="register.php" method="post">
			<input class="login" type="text" name="login" placeholder="Nom d'utilisateur" required />
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<input class="login" type="password" name="password_conf" placeholder="Confirmation" required />
			<br />
			<input class="submit" type="submit" value="Valider" />
		</form>
	</div>
</body>
</html>
