<?php

$host = "localhost";
$user = "root";
$pwd = "";
$bdd = "finelia";

$connexion = mysqli_connect($host,$user,$pwd,$bdd) or die("Echec connexion.");

$req2 = "SELECT nom FROM matiere";
$res2 = mysqli_query($connexion,$req2) or die("Erreur requete matiere.");

$matiere = isset($_GET['matiere'])?$_GET['matiere']:NULL;

	if(isset($_GET['confirm'])){

		if($_GET['note'] > 0 && $_GET['note'] <= 20){
			$note = isset($_GET['note'])? $_GET['note']:NULL;

			if(!empty($_GET['nom'])){
				$nom = isset($_GET['nom'])? $_GET['nom']:NULL;

				$req = "SELECT nom FROM etudiant WHERE nom = '$nom'";
				$res = mysqli_query($connexion,$req) or die("Erreur requete nom.");
				$exists = mysqli_num_rows($res);#si ce nom est present dans la bdd

				if(!empty($_GET['prenom'])){
					$prenom = isset($_GET['prenom'])? $_GET['prenom']:NULL;

					$req = "SELECT prenom FROM etudiant WHERE prenom = '$prenom'";
					$res = mysqli_query($connexion,$req) or die("Erreur requete prenom.");
					$exist = mysqli_num_rows($res);#si ce prenom est present dans la bdd

						if($exists != 0 && $exist != 0){	

							if($_GET['coeff'] > 0){	
								$coeff = $_GET['coeff'];	

								$req = "INSERT INTO note VALUES('$nom','$prenom','non','$note','$coeff')";
								$res = mysqli_query($connexion,$req) or die("Erreur insert note.");
								header('Location: moyenne.php');

							}else{
								$affiche = "Coefficient invalide.";
							}

						}else{
							$affiche = "Cet étudiant n'existe pas !";
						}
						
				}else{
					$affiche = "Veuillez saisir un prénom valide.";
				}
			}else{
				$affiche = "Veuillez saisir un nom valide.";
			}
		}else{
			$affiche = "Note Invalide !";

		}

	}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>FORMULAIRE</title>
</head>
<body>
	<div align="center">
		<h1>Veuillez saisir la note, le coefficient, la matière et l'étudiant</h1>

		<form method="GET" action="">
			<table width="50%">
				<tr>
					<td>
						<label>Nom de l'étudiant</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="nom" placeholder="nom" size="25">
					</td>
				</tr>
				<tr>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						<label>Prénom de l'étudiant</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="prenom" placeholder="prenom" size="25">
					</td>
				</tr>
				<tr>
					<td>
						<label>Note</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="number" name="note" placeholder="note" min="0" max="20">
					</td>
				</tr>
				<tr>
					<td>
						<label>Matière : </label>
					</td>
				</tr>
				<tr>
					<td>
						<select name="matiere">
						<?php
							while($line = mysqli_fetch_assoc($res2)){
								extract($line);
								echo "<option value='$nom'>$nom</option>";
							}
							if(isset($_GET['confirm'])){
								$matiere = $_GET['matiere'];
								$enom = $_GET['nom'];
								$req = "UPDATE note SET matiere = '$matiere' WHERE nom='$enom' AND prenom='$prenom'
								AND note = '$note'";	
								$res = mysqli_query($connexion,$req)or die("ERROR SET MATIERE");
							}				  
							
						?>
						</select>	 
					</td>
				</tr>
				<tr>
					<td>
						<label>Coefficient : </label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="number" name="coeff" min="1" max="20">
					</td>
				</tr>
				<tr>
					<td>
						<?php
							if(isset($affiche)){
								echo "<font color='red'>".$affiche."</font>";
							}
						?>
					</td>
				<tr>
					<td>
						<input type="submit" name="confirm" value="Valider">
					</td>
				</tr>
				<tr>
					<td>
						<a href="moyennes.php">Voir les moyennes</a>
					</td>
				</tr>
				
			</table>
			
		</form>

	</div>

</body>
</html>