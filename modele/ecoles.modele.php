<?php

function insertEcole($nom, $prenom, $email, $ecole) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO inscrits_ecoles (nom, prenom, email, ecole, date_heure_inscription) VALUES (:nom, :prenom, :email, :ecole, NOW())");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':ecole', $ecole, PDO::PARAM_STR);
	$insertion->execute();
	$update = $bdd->prepare("UPDATE ecoles SET eleves = eleves + 1 WHERE nomec = :nomec");
	$update->bindValue(':nomec', $ecole, PDO::PARAM_STR);
	return $update->execute();
}

function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT email FROM inscrits_ecoles WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

?>