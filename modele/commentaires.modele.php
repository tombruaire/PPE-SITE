<?php 

function post($contenu, $user_id) {
	global $bdd;
	$insert = $bdd->prepare("
		INSERT INTO commentaires (contenu, posted_date, posted_time, user_id) 
		VALUES (:contenu, CURDATE(), CURTIME(), :user_id)
	");
	$insert->bindValue(':contenu', $contenu, PDO::PARAM_STR);
	$insert->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	return $insert->execute();
}

function update($contenu, $idcom) {
	global $bdd;
	$update = $bdd->prepare("UPDATE commentaires SET contenu = :contenu WHERE idcom = :idcom");
	$update->bindValue(':contenu', $contenu, PDO::PARAM_STR);
	$update->bindValue(':idcom', $idcom, PDO::PARAM_INT);
	return $update->execute();
}

?>