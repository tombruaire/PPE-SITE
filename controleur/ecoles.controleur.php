<?php 

require "modele/ecoles.modele.php";

if (isset($_POST['inscription'])) {
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);
	$ecole = htmlspecialchars($_POST['ecole']);
	if ($nom != "" && $prenom != "" && $email != "" && $ecole != ""  && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($email);
			if (!$requete_email_exist) {
				$insertion = insertEcole($nom, $prenom, $email, $ecole);
				Alerts::setFlash("Merci ! Votre inscription a bien été pris en compte.");	
			} else {
				Alerts::setFlash("Cette adresse email est déjà utilisé.", "warning");
			}
		} else {
			Alerts::setFlash("Adresse email non valide.", "danger");
		}
	} else {
		Alerts::setFlash("Erreur lors de l'inscription, veuillez réessayer.", "danger");
	}
}

require "vue/ecoles.php"; 

?>