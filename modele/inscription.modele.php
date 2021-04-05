<?php

function checkPseudo($pseudo) {
	global $bdd;
	$SQL_pseudo = "SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo";
    $requete_pseudo_exist = $bdd->prepare($SQL_pseudo);
    $requete_pseudo_exist->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $requete_pseudo_exist->execute();
    return $requete_pseudo_exist->fetchAll(PDO::FETCH_OBJ);
}

function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT email FROM utilisateurs WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function insert($nom, $prenom, $pseudo, $email, $motdepasse, $numero) {
	global $bdd;
	$insertion = $bdd->prepare("
        INSERT INTO utilisateurs (nom, prenom, pseudo, email, motdepasse, date_inscription, heure_inscription, numero_confirmation, confirme, lvl) 
        VALUES (:nom, :prenom, :pseudo, :email, :motdepasse, CURDATE(), CURTIME(), :numero_confirmation, '0', '1')");
    $insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
    $insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $insertion->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $insertion->bindValue(':email', $email, PDO::PARAM_STR);
    $insertion->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $insertion->bindValue(':numero_confirmation', $numero, PDO::PARAM_INT);
    return $insertion->execute();
}

?>