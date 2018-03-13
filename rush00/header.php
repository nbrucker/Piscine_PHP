<div class="header">
	<a href="index.php"><img src="img/logo.png" class="logo" /></a>
	<ul class="right">
		<li>
			<span ></span>
		</li>
		<li>
			<a href='cart.php'><img src="img/cart.svg" class="log"></a>
		</li>
		<li>
			<?php
			if ($_SESSION['user'] == '')
			{
				?>
				<a href="signin.php"><img src="img/user.svg" class="log"></a>
				<?php
			}
			else
			{
				?>
				<img onclick="showBox()" src="img/user.svg" class="log">
				<?php
			}
			?>
		</li>
	</ul>
</div>
<div style="display: none;" class="logbox" id="logbox">
	<span class="logbox"><a href="account.php">Mon Compte</a> - <a href="logout.php">Deconnexion</a></span>
</div>
