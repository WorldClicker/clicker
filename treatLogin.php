<?php 

	$host = "127.0.0.1";
	$dbname = "clicker";
	$username = "root";
	$password = "";

	$pdo = new PDO('mysql:host=' . $host . ';'. 'dbname=' . $dbname, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function newPlayerSQL($pdo,$user,$password)
{

	$req = $pdo->prepare("INSERT INTO joueur (pseudo_joueur,motDePasse_joueur) VALUES (:pseudo_joueur, :motDePasse_joueur)");
		$req->execute(array(
			"pseudo_joueur" => $user,
			"motDePasse_joueur" => $password
		));
}



$erreur = false;
if (empty($_POST['pseudo'])) {
	$erreur = true;
	echo "Veuillez renseigner un pseudo <br>";
}

if (empty($_POST['password'])) {
	$erreur = true;
	echo "Veuillez renseigner un mot de passe <br>";
}

if ($erreur == false) {
	newPlayerSQL($pdo,$_POST['pseudo'],$_POST['password']);
	echo "Votre compte à bien été créé";

	include_once("game.php");
}



?>