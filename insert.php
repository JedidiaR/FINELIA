<?php

$host = "localhost";
$user = "root";
$pwd = "";
$bdd = "finelia";

$connexion = mysqli_connect($host,$user,$pwd,$bdd) or die("Echec connexion.");
$affiche = "entre des donnees";

if(isset($_POST['confirm'])){

	if(!empty($_POST['nom'])){

		if(!empty($_POST['prenom'])){

			$nom = mysqli_real_escape_string($connexion,$_POST['nom']);
			$prenom = mysqli_real_escape_string($connexion,$_POST['prenom']);

			$req = "INSERT INTO etudiant VALUES ('$nom','$prenom')";
			$res = mysqli_query($connexion, $req) or die("ERROR INSERT ETU");
			$affiche = "Nouvel étudiant créé !";
		}

	}
}

if(isset($_POST['ok'])){

	if(!empty($_POST['matiere'])){

		$matiere = $_POST['matiere'];#je me fais confiance

		if(!empty($_POST['prof'])){

			$prof = $_POST['prof'];

			$req = "INSERT INTO matiere VALUES ('$matiere','$prof')";
			$res = mysqli_query($connexion,$req) or die("ERROR INSERT MP");
			$affiche = "Nouvelle matière créée !";

		}

	}
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>ENTREES DE DONNEES</title>
</head>
<body>
	<form method="POST">
		<table>
			<tr>
				<td><?php echo $affiche; ?></td>
				<td>
					<input type="text" name="nom" placeholder="nom">
				</td>
				<td>
					<input type="text" name="prenom" placeholder="prenom">
				</td>
				<td>
					<input type="submit" name="confirm" value="confirm">
				</td>
				<td>
					<input type="text" name="matiere" placeholder="matiere">
				</td>
				<td>
					<input type="text" name="prof" placeholder="prof">
				</td>
				<td>
					<input type="submit" name="ok" value="OK">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>