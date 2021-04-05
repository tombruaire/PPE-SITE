<?php require "modele/recuperation-motdepasse.modele.php";

if (isset($_GET['section'])) {
	$section = htmlspecialchars($_GET['section']);
} else {
	$section = "";
}

if (isset($_POST['recupmdp'])) {
	if (!empty($_POST['recupemail'])) {
		$recupemail = htmlspecialchars($_POST['recupemail']);
		if (filter_var($recupemail, FILTER_VALIDATE_EMAIL)) {
			$requete = checkEmailUser($recupemail);
			if ($requete == 0) {
			   	Alerts::setFlash("Adresse email introuvable.", "warning");
			} else {
				$pseudo = $utilisateur['pseudo'];
				$_SESSION['recupemail'] = $recupemail;
				$recupcode = "";
				for ($i=0; $i<8; $i++) { 
					$recupcode .= mt_rand(0,9);
				}
				$recupemail_exist = checkEmailRecup($recupemail);
				if ($recupemail_exist == 1) {
					$recupupdate = updateCode($recupcode, $recupemail);
				} else {
					$recupinsert = insertCode($recupcode, $recupemail);
				}

				$header = "MIME-Version: 1.0\r\n";
				$header .= 'From: "mairievilliers.fr"<votreemail@gmail.com>'."\n";
				$header .= 'Content-Type:text/html; charset="utf-8"'."\n";
				$header .= 'Content-Transfer-Encoding: 8bit';

				$message = '
                <!DOCTYPE html>
                <html>
                <head>
                	<meta carset="utf-8">
                </head>
                <body>
                <h2>Bonjour <b>'.$pseudo.'</b>,</h2><br>
                <p>Voici votre code récupération : <b>'.$recupcode.'</b></p>
                </body>
                </html>
                ';

				mail($recupemail, "Rénitialisation du mot de passe", $message, $header);

				header('Location: http://localhost/PPE-SITE/recuperation-motdepasse?section=code');
			}
		} else {
			Alerts::setFlash("<strong>Format de l'adresse email invalide.</strong>", "warning");
		}
	} else {
		Alerts::setFlash("<strong>Veuillez saisir une adresse email.</strong>", "warning");
	}
}

if (isset($_POST['verif_submit'])) {
	if (!empty($_POST['verif_code'])) {
		$verif_code = htmlspecialchars($_POST['verif_code']);
		$requete_verification = $bdd->prepare("SELECT * FROM recuperation WHERE email = :email AND code = :code");
		$requete_verification->bindValue(':email', $_SESSION['recupemail'], PDO::PARAM_STR);
		$requete_verification->bindValue(':code', $verif_code, PDO::PARAM_INT);
		$requete_verification->execute();
		$success = $requete_verification->fetch();
		if ($success == 0) {
			Alerts::setFlash("<strong>Code de vérification invalide.</strong>", "danger");
		} else {
			$update_confirme = $bdd->prepare("UPDATE recuperation SET confirme = 1 WHERE email = :email");
			$update_confirme->bindValue(':email', $_SESSION['recupemail'], PDO::PARAM_STR);
			$update_confirme->execute();
			header('Location: http://localhost/PPE-SITE/recuperation-motdepasse?section=changemdp');
		}
	} else {
		Alerts::setFlash("<strong>Veuillez saisir votre code de vérification.</strong>", "warning");
	}
}

if (isset($_POST['newmotdepasse'])) {
	$verif_confirme = $bdd->prepare("SELECT confirme FROM recuperation WHERE email = :email");
	$verif_confirme->bindValue(':email', $_SESSION['recupemail'], PDO::PARAM_STR);
	$verif_confirme->execute();
	$verif_confirme = $verif_confirme->fetch();
	if ($verif_confirme['confirme'] == 1) {
		if (!empty($_POST['newmdp'])) {
			if (!empty($_POST['newmdp1'])) {
				$newmdp = sha1($_POST['newmdp']);
				$newmdp1 = sha1($_POST['newmdp1']);
				if ($newmdp == $newmdp1) {
					if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $_POST['newmdp1'])) {
						$update_motdepasse = $bdd->prepare("UPDATE utilisateurs SET motdepasse = :motdepasse WHERE email = :email");
						$update_motdepasse->bindValue(':motdepasse', $newmdp, PDO::PARAM_STR);
						$update_motdepasse->bindValue(':email', $_SESSION['recupemail'], PDO::PARAM_STR);
						$update_motdepasse->execute();
						$delete = $bdd->prepare("DELETE FROM recuperation WHERE email = :email");
						$delete->bindValue(':email', $_SESSION['recupemail'], PDO::PARAM_STR);
						$delete->execute();
						unset($_SESSION['id']);
						session_destroy();
						header('Location: http://localhost/PPE-SITE/connexion?success=1');
					} else {
						Alerts::setFlash("<strong>Votre mot de passe doit contenir au moins 1 lettre MAJUSCULE, 1 lettre minuscule, 1 chiffre et minimum 8 caractères.</strong>", "warning");
					}
				} else {
					Alerts::setFlash("<strong>Les mots de passes ne correspondent pas.</strong>", "warning");
				}
			} else {
				Alerts::setFlash("<strong>Veuillez confirmer votre mot de passe.</strong>", "warning");
			}
		} else {
			Alerts::setFlash("<strong>Veuillez saisir un mot de passe.</strong>", "primary");
		}
	} else {
		Alerts::setFlash("<strong>Veuillez valider votre mail grâce au code de vérification.</strong>", "warning");
	}
}

require "vue/recuperation-motdepasse.php";

?>