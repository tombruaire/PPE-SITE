<?php

function checkEmailUser($recupemail) {
	global $bdd;
	$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE email  = :recupemail");
	$requete->bindValue(':recupemail', $recupemail, PDO::PARAM_STR);
	$requete->execute();
	return $requete->fetch();
}

function checkEmailRecup($recupemail) {
	global $bdd;
	$recupemail_exist = $bdd->prepare("SELECT * FROM recuperation WHERE email = :email");
	$recupemail_exist->bindValue(':email', $recupemail, PDO::PARAM_STR);
	$recupemail_exist->execute();
	return $recupemail_exist->rowCount();
}

function updateCode($recupcode, $recupemail) {
	global $bdd;
	$recupupdate = $bdd->prepare("UPDATE recuperation SET code = :code WHERE email = :email ");
	$recupupdate->bindValue(':code', $recupcode, PDO::PARAM_INT);
	$recupupdate->bindValue(':email', $recupemail, PDO::PARAM_STR);
	return $recupupdate->execute();
}

function insertCode($recupcode, $recupemail) {
	global $bdd;
	$recupinsert = $bdd->prepare("INSERT INTO recuperation (email, code) VALUES (:email, :code)");
	$recupinsert->bindValue(':email', $recupemail, PDO::PARAM_STR);
	$recupinsert->bindValue(':code', $recupcode, PDO::PARAM_INT);
	$recupinsert->execute();
}



?>