<?php

$host = "localhost";
$user = "root";
$pwd = "";
$bdd = "finelia";

$connexion = mysqli_connect($host,$user,$pwd,$bdd) or die("Echec connexion.");

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
				
					<?php
						#selection de tous les etudiants
						$req = "SELECT DISTINCT nom,prenom FROM note";
						$res = mysqli_query($connexion,$req)or die ("ERROR SELECT DISTINCT");

						while($line = mysqli_fetch_assoc($res)){

							$nom = $line['nom'];
							$prenom = $line['prenom'];

							#calcul des moyennes pour chaque etudiant different grace au DISTINCT
							$reqq = "SELECT SUM(note*coeff) as sum,SUM(coeff) as co FROM note
							WHERE nom = '$nom' AND prenom='$prenom'";
							$ress = mysqli_query($connexion,$reqq) or die ("ERROR SELECT");
							$li = mysqli_fetch_assoc($ress);

							$avg = $li['sum'] / $li['co'];

							echo "<tr><td>$nom</td><td>$prenom</td><td>$avg</td></tr>";
							
						}

					?>
				
			</table>

		</form>
	</div>
	<footer><a href="formulaire.php">Formulaires</a></footer>

</body>
</html>