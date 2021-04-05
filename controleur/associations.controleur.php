<?php 

require "modele/associations.modele.php";

if (isset($_POST['inscription'])) {
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);
	$association = htmlspecialchars($_POST['association']);
	if ($nom != "" && $prenom != "" && $email != "" && $association != ""  && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($email);
			if (!$requete_email_exist) {
				$insertion = insertAssociations($nom, $prenom, $email, $association);
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

require "vue/associations.php"; 

?>