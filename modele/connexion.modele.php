<?php

function getUtilisateur($pseudo, $motdepasse) {
	global $bdd;
	$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND motdepasse = :motdepasse");
	$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$requete->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
	$requete->execute();
	return $requete->fetch();
}

?>
