<?php 

	$host = "127.0.0.1";
	$dbname = "clicker";
	$username = "root";
	$password = "";

	$pdo = new PDO('mysql:host=' . $host . ';'. 'dbname=' . $dbname, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function newPlayerSQL($pdo,$user,$password)
{

	$req = $pdo->prepare("INSERT INTO joueur (pseudo_joueur,motDePasse_joueur,nbClick_joueur) VALUES (:pseudo_joueur, :motDePasse_joueur,:nbClick_joueur)");
		$req->execute(array(
			"pseudo_joueur" => $user,
			"motDePasse_joueur" => $password,
			"nbClick_joueur" => 0
		));
}

function recherchePlayer($pdo,$user)
{
	$pseudoUse = false;
	$req = $pdo->query("SELECT pseudo_joueur FROM joueur")->fetchAll();

	for ($i=0; $i < count($req); $i++) { 
		
		if ($req[$i][0] == $_POST['pseudo']) {
			$pseudoUse = true;
		}

	}
	if ($pseudoUse == true)
		return false;
	else
		return true;
}


echo "<p class='error'>";
$erreur = false;
if (empty($_POST['pseudo'])) {
	$erreur = true;
	echo "Veuillez renseigner un pseudo <br>";
}

if (empty($_POST['password'])) {
	$erreur = true;
	echo "Veuillez renseigner un mot de passe <br>";
}

if (!recherchePlayer($pdo,$_POST['pseudo'])) {
	$erreur = true;
	echo "Ce pseudo est déjà utilisé";
}
echo "</p>";
if ($erreur == false) {
	newPlayerSQL($pdo,$_POST['pseudo'],$_POST['password']);
	echo "Votre compte à bien été créé";

	header('Location: game.php');
}

;



?>