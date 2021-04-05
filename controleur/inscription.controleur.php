<?php require "modele/inscription.modele.php";
include_once 'recaptcha/autoload.php';

if (isset($_SESSION['id'])) {
    header('Location: http://localhost/PPE-SITE/');
}

if (isset($_POST['inscription'])) {
    if (!empty($_POST['nom'])) {
        if (!empty($_POST['prenom'])) {
            if (!empty($_POST['pseudo'])) {
                if (!empty($_POST['email'])) {
                    if (!empty($_POST['motdepasse'])) {
                        if (!empty($_POST['motdepasse2'])) {
                            $nom = htmlspecialchars($_POST['nom']);
                            $prenom = htmlspecialchars($_POST['prenom']);
                            $pseudo = htmlspecialchars($_POST['pseudo']);
                            $email = htmlspecialchars($_POST['email']);
                            $motdepasse = sha1($_POST['motdepasse']);
                            $motdepasse2 = sha1($_POST['motdepasse2']);
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$#", $email)) {                  
                                    if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $_POST['motdepasse'])) {
                                        if ($motdepasse == $motdepasse2) {
                                            $pseudolength = strlen($pseudo);
                                            if ($pseudolength <= 15) {
                                                $requete_pseudo_exist = checkPseudo($pseudo);
                                                $requete_email_exist = checkEmail($email);
                                                if ($requete_pseudo_exist) {
                                                    Alerts::setFlash("Ce pseudo est déjà utilisé.", "warning");
                                                } elseif ($requete_email_exist) {
                                                    Alerts::setFlash("Cette adresse email est déjà utilisée.", "warning");
                                                } elseif (isset($_POST['g-recaptcha-response'])) {
                                                    $recaptcha = new \ReCaptcha\ReCaptcha('cle_secrete');
                                                    $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
                                                    if ($resp->isSuccess()) {
                                                        $longueurNumero = 15;
                                                        $numero = "";
                                                        for ($i=1; $i<$longueurNumero; $i++) {
                                                            $numero .= mt_rand(0,9);
                                                        }
                                                        $insertion = insert($nom, $prenom, $pseudo, $email, $motdepasse, $numero);
                                                        $NOM_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET nom = UPPER(nom)");
                                                        $NOM_MAJUSCULE->execute(array($nom));
                                                        $Prenom_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET prenom = CONCAT(UCASE(LEFT(prenom,1)), LCASE(SUBSTRING(prenom,2)))");
                                                        $Prenom_MAJUSCULE->execute(array($prenom));

                                                        $header = "MIME-Version: 1.0\r\n";
                                                        $header .= 'From: "mairievilliers"<votreemail@gmail.com>'."\n";
                                                        $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
                                                        $header .= 'Content-Transfer-Encoding: 8bit';

                                                        $email = "$email";

                                                        $pseudo = "$pseudo";

                                                        $message = '
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<body>
<div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en">
    <table style="font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="--bg-opacity: 1; font-family: Montserrat, -apple-system, "Segoe UI", sans-serif;">
                <table class="sm-w-full" style="font-family: "Montserrat", Arial, sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td align="center" class="sm-px-24" style="font-family: "Montserrat", Arial, sans-serif;">
                            <table style="font-family: "Montserrat", Arial, sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: rgb(24, 26, 27); font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="left">
                                        <p style="font-weight: 600; font-size: 18pt; margin-bottom: 0; color: #f8f9fa!important; text-align: center;">
                                            Bienvenue <font style="font-weight: 700; font-size: 18pt; margin-top: 0; --text-opacity: 1; color: #ff5850;">'.$pseudo.'</font> !
                                        </p>
                                        <p class="sm-leading-32" style="font-weight: 600; font-size: 20px; margin: 0 0 16px; --text-opacity: 1; color: #263238; margin-top: 5%; color: #f8f9fa!important; text-align: center;">
                                            Merci pour votre inscription !
                                        </p>
                                        <p style="margin: 0 0 24px; color: #f8f9fa!important; text-align: center;">
                                            Veuillez vérifier votre adresse email en cliquant sur le bouton ci-dessous afin d\'activer votre compte.
                                        </p>
                                        <table style="font-family: "Montserrat",Arial,sans-serif;" cellpadding="0" cellspacing="0" role="presentation" align="center">
                                            <tr>
                                                <td">
                                                    <a style="display: block; font-weight: 600; font-size: 14px; line-height: 100%; padding: 16px 24px; --text-opacity: 1; color: #ffffff; text-decoration: none; background-color: #198754!important; border-color: #198754!important; border-radius: .25rem!important;" href="http://localhost/PPE-SITE/connexion?pseudo='.urldecode($pseudo).'&numero='.$numero.'">
                                                        Activer mon compte
                                                    </a>
                                                </td>
                                            </tr>
                                        </table><br>
                                        <table style="font-family: "Montserrat",Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td style="font-family: "Montserrat",Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                                                    <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">&zwnj;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0 0 16px; text-align: center; color: #f8f9fa!important;">
                                            Ceci est un mail automatique, merci de ne pas répondre.
                                        </p>
                                    </td>
                                </tr>
                            <tr>
                            <td style="font-family: "Montserrat",Arial,sans-serif; height: 20px;" height="20"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</div>

</body>
</html>
                                                        ';

                                                        mail($email, "Confirmation de compte", $message, $header, $pseudo);
                                                        header('Location: connexion?confirmation=1');
                                                        exit();
                                                    } else {
                                                        $errors = $resp->getErrorCodes();
                                                        Alerts::setFlash("<strong>Erreur :</strong> Veuillez compléter le reCAPTCHA", "danger");
                                                    }
                                                } else {
                                                    Alerts::setFlash("<strong>Erreur :</strong> Veuillez compléter le reCAPTCHA", "danger");
                                                }
                                            } else {
                                                Alerts::setFlash("<strong>Erreur :</strong> Le pseudo ne doit pas dépasser 15 caractères.", "warning");
                                            }
                                        } else {
                                            Alerts::setFlash("<strong>Erreur :</strong> Les mots de passes ne correspondent pas.", "warning");
                                        }
                                    } else {
                                        Alerts::setFlash("<strong>Erreur :</strong> Votre mot de passe doit contenir au moins 1 lettre MAJUSCULES, 1 lettre minuscules, 1 chiffre et minimum 8 caractères.", "warning");
                                    }
                                } else {
                                    Alerts::setFlash("<strong>Erreur :</strong> Format de l'adresse email invalide.", "warning");
                                }
                            } else {
                                Alerts::setFlash("<strong>Erreur :</strong> Format de l'adresse email invalide.", "warning");
                            }
                        } else {
                            Alerts::setFlash("<strong>Erreur :</strong> Veuillez confirmer votre mot de passe", "warning");
                        }
                    } else {
                        Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir un mot de passe.", "warning");
                    }
                } else {
                    Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir une adresse email.", "warning");
                }
            } else {
                Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir un pseudo.", "warning");
            }
        } else {
            Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir votre prénom.", "warning");
        }
    } else {
        Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir votre nom.", "warning");
    }
}

require "vue/inscription.php";

?>