<!doctype html>
	<html>
		<head>

		<title>Clicker LeaderBoard</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">

		</head>

	<body>

		<header>
		<h1><a href="game.php">World Clicker</a></h1>

		<nav>
			<ul>
				<li><a href="lb.php">LeaderBoard</a></li>
				<li><a href="">Twitter</a></li>
			</ul>
		</nav>
	</header>

	<section class="lb">

	<?php 

		$host = "127.0.0.1";
		$dbname = "clicker";
		$username = "root";
		$password = "";

		$pdo = new PDO('mysql:host=' . $host . ';'. 'dbname=' . $dbname, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	function recherchePlayer($pdo)
	{

		$req = $pdo->query("
			SELECT pseudo_joueur,nbClick_joueur FROM joueur WHERE nbClick_joueur = (SELECT MAX(nbClick_joueur) FROM joueur)
			")->fetchAll();

		echo "<br>#1 : ".$req[0][0]." avec ".$req[0][1]." clicks";
	}

	recherchePlayer($pdo);

	?>

	</section>

	</body>
</html>