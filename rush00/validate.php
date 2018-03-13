<?php include('database.php'); ?>
<?php
if ($_SESSION['user'] == "")
{
	header('Location: signin.php');
	exit;
}
else
{
	$total = 0;
	if (isset($_SESSION['cart']))
	{
		$commande = [];
		foreach ($_SESSION['cart'] as $key => $el)
		{
			if ($el > 0)
			{
				$name = mysqli_real_escape_string($db, $key);
				$req = mysqli_query($db, "SELECT prix FROM items WHERE name = '$name'");
				if (mysqli_num_rows($req) > 0 && $ans = mysqli_fetch_array($req, MYSQLI_ASSOC))
				{
					$prix = $ans['prix'] * $el;
					$total += $prix;
					$commande[$name] = $el;
				}
			}
		}
		if ($total == 0)
		{
			header('Location: index.php');
			exit;
		}
		$login = mysqli_real_escape_string($db, $_SESSION['user']);
		$str = serialize($commande);
		$date = time();
		mysqli_query($db, "INSERT INTO commandes (login, creation, prix, items) VALUES ('$login', '$date', '$total', '$str')");
		$_SESSION['cart'] = [];
	}
	if ($total == 0)
	{
		header('Location: index.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="cart_box">
		<span class="empty_cart">Votre commande a bien été validé, merci et à bientôt</span>
	</div>
</body>
</html>
