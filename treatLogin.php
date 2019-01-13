<?php 

	$host = "127.0.0.1";
	$dbname = "clicker";
	$username = "root";
	$password = "";

	$pdo = new PDO('mysql:host=' . $host . ';'. 'dbname=' . $dbname, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function recherchePlayer($pdo,$user,$mdp)
{
	$validation = false;

	$motdepasse = $pdo->query("SELECT motdepasse_joueur FROM joueur WHERE pseudo_joueur = '$user'")->fetchAll();

	for ($i=0; $i < count($motdepasse); $i++) { 
		
		if ($motdepasse[$i][0] == $mdp) {
			$validation = true;
		}

	}
	if ($validation == true)
		return true;
	else
		return false;
}

$erreur = false;

echo "<p class='error'>";

if (!recherchePlayer($pdo,$_POST['pseudo'],$_POST['password'])) {
	$erreur = true;
	echo "Pseudo et/ou mot de passe incorrect";
}

echo "</p>";

if ($erreur == false) {
	header('Location: game.php');
}



?>