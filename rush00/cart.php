<?php include('database.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="cart_box">
		<?php
		$x = 0;
		$total = 0;
		if (isset($_SESSION['cart']))
		{
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
						?>
						<div class="cart_item">
							<span class="cart_item_name"><?php echo $key ?></span>
							<span class="cart_item_price"><?php echo $prix ?>€</span>
							<a href="cart_remove.php?name=<?php echo $key ?>"><span class="cart_number cart_moins">-</span></a>
							<a href="cart_add.php?name=<?php echo $key ?>"><span class="cart_number cart_plus">+</span></a>
							<span class="cart_number"><?php echo $el ?></span>
						</div>
						<?php
						$x += $el;
					}
				}
			}
		}
		if ($x == 0)
		{
			?>
			<span class="empty_cart">Votre panier est vide !</span>
			<a style="color: #2090FF; font-size: 20px;" href="index.php">Voir nos produits</a>
			<?php
		}
		else
		{
			?>
			<div class="cart_total">
				<span class="cart_total">Total: <?php echo $total ?>€</span>
				<a href="validate.php">
					<div class="cart_valid">
						VALIDER ET PAYER
					</div>
				</a>
			</div>
			<?php
		}
		?>
	</div>
</body>
</html>
