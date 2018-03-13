<?php include('database.php') ?>
<?php
if ($_SESSION['user'] == '')
{
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Compte</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="js.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php include('header.php') ?>
	<div class="commandes_box">
		<?php
		$login = mysqli_real_escape_string($db, $_SESSION['user']);
		$req = mysqli_query($db, "SELECT * FROM commandes WHERE login = '$login' ORDER BY creation DESC");
		while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
		{
			$array = unserialize($el['items']);
			$time = date("d/m/Y H:i:s", $el['creation'])
			?>
			<div class="commandes">
				<span class="commandes"><?php echo $time ?>: <?php echo $el['prix'] ?>€
				<?php
				foreach ($array as $key => $value)
					echo "<br /><br />".$value." ".$key;
				?>
				</span>
			</div>
			<?php
		}
		?>
		<a style="color: #2090FF; font-size: 14px;" href="modify_password.php">Modifier mon mot de passe</a> - <a style="color: #2090FF; font-size: 14px;" href="delete.php">Supprimer mon compte</a>
	</div>
	<?php
	$login = mysqli_real_escape_string($db, $_SESSION['user']);
	$req = mysqli_query($db, "SELECT type FROM users WHERE login = '$login'");
	$el = mysqli_fetch_array($req, MYSQLI_ASSOC);
	if ($el['type'] != "admin")
		exit;
	?>
	<div class="box_admin">
		<span class="admin_title">ADMINISTRATION</span>
		<form class="removeBox" action="remove_item.php" method="post">
			<select class="select_type_remove" name="object" required>
				<?php
				$req = mysqli_query($db, "SELECT name FROM items");
				while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
					echo "<option value='".$el['name']."'>".$el['name']."</option>";
				?>
			</select>
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<br />
			<input class="submit" type="submit" value="Supprimer" />
		</form>
		<form class="addBox" action="add_item.php" method="post">
			<select class="select_type_remove" name="type" required>
				<option value="Burgers">Burgers</option>
				<option value="Sandwichs">Sandwichs</option>
				<option value="Pasta Box">Pasta Box</option>
				<option value="Americains">Americains</option>
				<option value="Salades">Salades</option>
				<option value="Accompagnements">Accompagnements</option>
			</select>
			<br />
			<input class="login" type="type" name="name" placeholder="Nom" required />
			<br />
			<input class="login" type="type" name="prix" placeholder="Prix" required />
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<br />
			<input class="submit" type="submit" value="Ajouter" />
		</form>
		<div style="display: block; width: 100%; height: 1px; margin-top: 400px;"></div>
		<form class="removeBox" action="modify_item.php" method="post">
			<select class="select_type_remove" name="object" required>
				<?php
				$req = mysqli_query($db, "SELECT name FROM items");
				while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
					echo "<option value='".$el['name']."'>".$el['name']."</option>";
				?>
			</select>
			<br />
			<input class="login" type="text" name="name" placeholder="Nom" />
			<br />
			<input class="login" type="text" name="prix" placeholder="Prix" />
			<br />
			<select class="select_type_remove" name="type">
				<option value="" >Type</option>
				<option value="Burgers" >Burgers</option>
				<option value="Sandwichs" >Sandwichs</option>
				<option value="Pasta Box" >Pasta Box</option>
				<option value="Americains" >Americains</option>
				<option value="Salades" >Salades</option>
				<option value="Accompagnements" >Accompagnements</option>
			</select>
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<br />
			<input class="submit" type="submit" value="Modifier" />
		</form>
		<form class="addBox" action="remove_user.php" method="post">
			<select class="select_type_remove" name="login" required>
				<?php
				$req = mysqli_query($db, "SELECT login FROM users WHERE type = 'user' ORDER BY login");
				while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
					echo "<option value='".$el['login']."'>".$el['login']."</option>";
				?>
			</select>
			<br />
			<input class="login" type="password" name="password" placeholder="Mot de passe" required />
			<br />
			<br />
			<input class="submit" type="submit" value="Supprimer" />
		</form>
	</div>
	<div style="margin-top: 350px;" class="commandes_box">
		<?php
		$req = mysqli_query($db, "SELECT * FROM commandes ORDER BY creation DESC");
		while ($el = mysqli_fetch_array($req, MYSQLI_ASSOC))
		{
			$array = unserialize($el['items']);
			$time = date("d/m/Y H:i:s", $el['creation'])
			?>
			<div class="commandes">
				<span class="commandes"><?php echo $el['login'] ?>
				<br />
				<?php echo $time ?>: <?php echo $el['prix'] ?>€
				<?php
				foreach ($array as $key => $value)
					echo "<br /><br />".$value." ".$key;
				?>
				</span>
			</div>
			<?php
		}
		?>
	</div>
</body>
</html>
