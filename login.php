<!DOCTYPE html>
<html>
<head>
	<title>Clicker Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="connexion">

		<nav>
			<ul>
				<li><a href="register.php">Nouveau ? S'enregistrer</a></li>
			</ul>
		</nav>

		<form action="index.php" method="POST">
		
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo">

		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password">

		<input type="submit" name="valider" value="Valider">

	</form>

		<?php

		if (!empty($_POST)) {
			include_once("treat.php");
		}

		?>

</body>
</html>