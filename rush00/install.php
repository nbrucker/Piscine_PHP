<?php
$servername = "localhost";
$username = "root";
$password = "root";
try
{
	date_default_timezone_set("Europe/Paris");
	$db = mysqli_connect($servername, $username, $password);
	mysqli_query($db, "create database shop");
	mysqli_query($db, "use shop");

	// table items;
	mysqli_query($db, "CREATE TABLE items (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		name TEXT NOT NULL,
		prix FLOAT UNSIGNED NOT NULL,
		type enum('Burgers', 'Sandwichs', 'Pasta Box', 'Americains', 'Salades', 'Accompagnements') NOT NULL)");

	// table users;
	mysqli_query($db, "CREATE TABLE users (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		login TEXT NOT NULL,
		password TEXT NOT NULL,
		creation INT UNSIGNED NOT NULL,
		type enum('admin', 'user') NOT NULL)");

	// table commandes;
	mysqli_query($db, "CREATE TABLE commandes (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
		login TEXT NOT NULL,
		creation INT UNSIGNED NOT NULL,
		prix FLOAT UNSIGNED NOT NULL,
		items TEXT NOT NULL)");

	// Burgers
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Burger Classique', '4.3', 'Burgers')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Burger Classique Emmental', '4.5', 'Burgers')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Burger Vegetarien', '4.3', 'Burgers')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Burger Vegetarien La Chevrette', '4.4', 'Burgers')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Burger Bacon', '4.6', 'Burgers')");

	// Sandwichs
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Sandwich Vegetarien', '2', 'Sandwichs')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Sandwich Baguette Jambon', '2.5', 'Sandwichs')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Sandwich Baguette Rosette', '2.5', 'Sandwichs')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Sandwich Baguette Thon', '2.5', 'Sandwichs')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Sandwich Baguette Poulet', '3', 'Sandwichs')");

	// Pasta Box
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Pasta Box Carbonara', '2.2', 'Pasta Box')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Pasta Box Bolognaise', '2.2', 'Pasta Box')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Pasta Box Sauce Tomate', '2.5', 'Pasta Box')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Pasta Box Pesto', '2.8', 'Pasta Box')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Pasta Box Beurre', '2', 'Pasta Box')");

	// Americains
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Americain Steak', '2.2', 'Americains')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Americain Steak Frites', '3.5', 'Americains')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Americain Poulet', '3.2', 'Americains')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Americain Poulet Frites', '3.5', 'Americains')");

	// Salades
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Salades Tomate chevre', '3', 'Salades')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Salades Jambon', '3.3', 'Salades')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Salades Poulet', '3.7', 'Salades')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Salades Thon', '3.3', 'Salades')");
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Salades Vegetarien', '2.5', 'Salades')");

	// Accompagnements
	mysqli_query($db, "INSERT INTO items (name, prix, type) VALUES ('Barquette de Frites', '1.7', 'Accompagnements')");

	// Admin
	$hash = hash('whirlpool', 'root');
	$date = time();
	mysqli_query($db, "INSERT INTO users (login, password, creation, type) VALUES ('root', '$hash', '$date', 'admin')");
	header('Location: index.php');
	echo "Succes\n";
}
catch (Exception $e)
{
	echo "Error\n";
}
?>
