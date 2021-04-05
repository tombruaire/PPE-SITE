<?php

function insertAssociations($nom, $prenom, $email, $association) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO inscrits_associations (nom, prenom, email, association, date_heure_inscription) VALUES (:nom, :prenom, :email, :association, NOW())");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':association', $association, PDO::PARAM_STR);
	$insertion->execute();
	$update = $bdd->prepare("UPDATE associations SET inscrits = inscrits + 1 WHERE nomassoc = :nomassoc");
	$update->bindValue(':nomassoc', $association, PDO::PARAM_STR);
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

?>