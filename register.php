<!DOCTYPE html>
<html>
<head>
	<title>Clicker Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="connexion">

		<nav>
			<ul>
				<li>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></li>
			</ul>
		</nav>

	<form action="register.php" method="POST">
		
	<table>

		<td><label for="pseudo">Pseudo :</label></td>
		<td><input type="text" name="pseudo" id="pseudo"
		<?php
		if (!empty($_POST['pseudo'])) {
			echo "value='".$_POST['pseudo']."'";
		}
		?>
		></td><tr>
		<br>
		<td><label for="password">Mot de passe :</label></td>
		<td><input type="password" name="password" id="password"></td>
		<br>

	</table>

		<input type="submit" name="valider" value="Valider">

	</form>

		<?php

		if (!empty($_POST)) {
			include_once("treatRegister.php");
		}

		?>

</body>
</html>