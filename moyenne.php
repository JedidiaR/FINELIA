<?php

$host = "localhost";
$user = "root";
$pwd = "";
$bdd = "finelia";

$connexion = mysqli_connect($host,$user,$pwd,$bdd) or die("Echec connexion.");

$req = "SELECT nom FROM matiere";
$res = mysqli_query($connexion,$req) or die("Erreur requete note.");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>MOYENNES</title>
</head>
<body>
	<div align="center">
		<form method="GET">
			<table border="solid">
				<tr>
					<td>ETUDIANT</td>

					<td>MATIERE</td>

					<td>MOYENNE GLOBALE</td>
				</tr>
				<tr>
					<?php
						#pour chaque matiere, calculer la moyenne de l'etudiant
						while($line = mysqli_fetch_assoc($res)){
							extract($line);
							
							echo "<tr><td>$nom $prenom</td><td>$matiere</td><td>$result</td></tr>";

						}

					?>
				</tr>
			</table>

		</form>
	</div>
	<footer><a href="formulaire.php">Formulaires</a></footer>

</body>
</html>