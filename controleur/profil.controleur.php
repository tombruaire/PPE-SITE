<?php require "modele/profil.modele.php";

if (!isset($_SESSION['id'])) {
	header('Location: http://localhost/PPE-SITE/connexion');
}

// Modification du pseudo
if (isset($_POST['new-pseudo'])) {
	if (!empty($_POST['pseudo'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
        $requete_pseudo_exist = checkPseudo($pseudo);
        if ($requete_pseudo_exist) {
            Alerts::setFlash("Ce pseudo est déjà utilisé.", "warning");
        } else {
        	$requete_update_pseudo = updatePseudo($pseudo);
            Session::destroy();
			exit();
	    }
	}
}

// Modification de l'adresse email
if (isset($_POST['new-email'])) {
	if (!empty($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
        $requete_email_exist = checkEmail($email);
        if ($requete_email_exist) {
            Alerts::setFlash("Cette adresse email déjà utilisé.", "warning");
        } else {
        	$requete_update_email = updateEmail($email);
            Session::destroy();
			exit();
	    }
	}
}

// Modification du mot de passe
if (isset($_POST['new-motdepasse'])) {
	if (!empty($_POST['new-password-1'])) {
		if (!empty($_POST['new-password-2'])) {
			$motdepasse1 = sha1($_POST['new-password-1']);
			$motdepasse2 = sha1($_POST['new-password-2']);
			if ($motdepasse1 == $motdepasse2) {
				if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $_POST['new-password-1'])) {
					$requete_update_motdepasse = updateMotdepasse($motdepasse1);
		            Session::destroy();
					exit();
				} else {
					Alerts::setFlash("<strong>Erreur :</strong> Votre mot de passe doit contenir au moins 1 lettre MAJUSCULE, 1 lettre minuscule, 1 chiffre et minimum 8 caractères.", "warning");
				}
			} else {
				Alerts::setFlash("<strong>Erreur : </strong> Les mots de passe ne correspondent pas.", "warning");
			}
		}
	}
}

// Suppresion du compte
if (isset($_POST['delete'])) {
	if (!empty($_POST['email'])) {
		if (!empty($_POST['motdepasse'])) {
			$email = htmlspecialchars($_POST['email']);
			$motdepasse = sha1($_POST['motdepasse']);
			$requete_email_exist = checkEmail($email);
            if ($requete_email_exist) {
				$delete = deleteCompte($email);
				Session::destroy();
				exit();
            } else {
            	Alerts::setFlash("Adresse email introuvable.", "warning");
            }
		}
	}
}

require "vue/profil.php";

?>