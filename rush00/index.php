<?php include('database.php'); ?>
<?php
$select = [];
$select['Tout'] = "";
$select['Burgers'] = "";
$select['Sandwichs'] = "";
$select['Pasta Box'] = "";
$select['Americains'] = "";
$select['Salades'] = "";
$select['Accompagnements'] = "";
if (isset($_GET['type']))
	$select[$_GET['type']] = "selected";
?>
<!DOCTYPE html>
<html>
<head>
	<title>FoodTruck</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="select_box">
		<select class="select_type" onchange="filtre(this)">
			<option <?php echo $select['Tout'] ?> >Tout</option>
			<option <?php echo $select['Burgers'] ?> >Burgers</option>
			<option <?php echo $select['Sandwichs'] ?> >Sandwichs</option>
			<option <?php echo $select['Pasta Box'] ?> >Pasta Box</option>
			<option <?php echo $select['Americains'] ?> >Americains</option>
			<option <?php echo $select['Salades'] ?> >Salades</option>
			<option <?php echo $select['Accompagnements'] ?> >Accompagnements</option>
		</select>
	</div>
	<div class="items_box">
		<?php
		if (!isset($_GET['type']) || $_GET['type'] == "Tout")
			$str = "SELECT * FROM items ORDER BY type";
		else
		{
			$type = mysqli_real_escape_string($db, $_GET['type']);
			$str = "SELECT * FROM items WHERE type = '$type' ORDER BY type";
		}
		$req = mysqli_query($db, $str);
		$x = 0;
		while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
		{
			$src = "img/".$el['type'];
			$str = '';
			if ($x % 3 != 0)
				$str = 'style="margin-left: 2%"';
			?>
			<div <?php echo $str ?> class="items">
				<div class="img_box">
					<img class="items" src="<?php echo $src ?>">
				</div>
				<div class="text_box">
					<span class="item_name"><?php echo $el['name'] ?></span>
					<span class="item_price"><?php echo $el['prix'] ?>€</span>
				</div>
				<a href="cart_add.php?name=<?php echo $el['name'] ?>">
					<div class="add_box">
						AJOUTER AU PANIER
					</div>
				</a>
			</div>
			<?php
			$x++;
		}
		?>
	</div>
</body>
</html>
