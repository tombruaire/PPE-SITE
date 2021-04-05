<?php

/*** MODIFICATION DU PSEUDO ***/
function checkPseudo($pseudo) {
	global $bdd;
	$SQL_pseudo = "SELECT * FROM utilisateurs WHERE pseudo = :pseudo";
    $requete_pseudo_exist = $bdd->prepare($SQL_pseudo);
    $requete_pseudo_exist->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $requete_pseudo_exist->execute();
    return $requete_pseudo_exist->fetchAll(PDO::FETCH_OBJ);
}

function updatePseudo($pseudo) {
	global $bdd;
	$UPDATE_pseudo = "UPDATE utilisateurs SET pseudo = :pseudo WHERE id = '".$_SESSION['id']."' ";
	$requete_update_pseudo = $bdd->prepare($UPDATE_pseudo);
	$requete_update_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	return $requete_update_pseudo->execute();
}

/*** MODIFICATION DE L'ADRESSE EMAIL ***/
function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT * FROM utilisateurs WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateEmail($email) {
	global $bdd;
	$UPDATE_email = "UPDATE utilisateurs SET email = :email WHERE id = '".$_SESSION['id']."' ";
	$requete_update_email = $bdd->prepare($UPDATE_email);
	$requete_update_email->bindValue(':email', $email, PDO::PARAM_STR);
	return $requete_update_email->execute();
}

/*** MODIFICATION DU MOT DE PASSE ***/
function updateMotdepasse($motdepasse1) {
	global $bdd;
	$UPDATE_motdepasse = "UPDATE utilisateurs SET motdepasse = :motdepasse WHERE id = '".$_SESSION['id']."' ";
	$requete_update_motdepasse = $bdd->prepare($UPDATE_motdepasse);
	$requete_update_motdepasse->bindValue(':motdepasse', $motdepasse1, PDO::PARAM_STR);
	return $requete_update_motdepasse->execute();
}

/*** SUPPRESSION DU COMTPE ***/
function deleteCompte($email) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM utilisateurs WHERE id = '".$_SESSION['id']."' ");
	$delete->bindValue(':email', $email, PDO::PARAM_STR);
	return $delete->execute();
}

?>