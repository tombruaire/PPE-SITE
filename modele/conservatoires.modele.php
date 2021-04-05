<?php

function insertInscription($nom, $prenom, $email, $tel, $adresse, $conservatoire) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO inscrits_conservatoires (nom, prenom, email, tel, adresse, conservatoire, date_heure_inscription) VALUES (:nom, :prenom, :email, :tel, :adresse, :conservatoire, NOW())");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':tel', $tel, PDO::PARAM_STR);
	$insertion->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	$insertion->bindValue(':conservatoire', $conservatoire, PDO::PARAM_STR);
	$insertion->execute();
	$update = $bdd->prepare("UPDATE conservatoires SET effectifs = effectifs + 1 WHERE nomconserv = :nomconserv");
	$update->bindValue(':nomconserv', $conservatoire, PDO::PARAM_STR);
	return $update->execute();
}

function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT email FROM inscrits_conservatoires WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function checkTel($tel) {
	global $bdd;
	$SQL_tel = "SELECT tel FROM inscrits_conservatoires WHERE tel = :tel";
    $requete_tel_exist = $bdd->prepare($SQL_tel);
    $requete_tel_exist->bindParam(':tel', $tel, PDO::PARAM_STR);
    $requete_tel_exist->execute();
    return $requete_tel_exist->fetchAll(PDO::FETCH_OBJ);
}

function checkAdresse($adresse) {
	global $bdd;
	$SQL_adresse = "SELECT adresse FROM inscrits_conservatoires WHERE adresse = :adresse";
    $requete_adresse_exist = $bdd->prepare($SQL_adresse);
    $requete_adresse_exist->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $requete_adresse_exist->execute();
    return $requete_adresse_exist->fetchAll(PDO::FETCH_OBJ);
}

?>