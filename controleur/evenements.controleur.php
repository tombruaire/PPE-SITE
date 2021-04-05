<?php 

require "modele/evenements.modele.php";

if (isset($_POST['participer'])) {
	$emailuser = htmlspecialchars($_POST['emailuser']);
	$evenement = htmlspecialchars($_POST['evenement']);
	if ($emailuser != "" && $evenement != "" && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $emailuser)) {
		if (filter_var($emailuser, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($emailuser);
			if (!$requete_email_exist) {

				$insertion = insertParticipation($emailuser, $evenement);
				Alerts::setFlash("Merci ! Votre demande de participation a bien été pris en compte.");

				$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :emailuser");
				$requete->bindValue(':emailuser', $emailuser, PDO::PARAM_STR);
				$requete->execute();
				$user = $requete->fetch();
				
				$pseudo = $user['pseudo'];

				$header = "MIME-Version: 1.0\r\n";
                $header .= 'From: "mairievilliers"<votreemail@gmail.com>'."\n";
                $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
                $header .= 'Content-Transfer-Encoding: 8bit';

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
                                            Bonjour <font style="font-weight: 700; font-size: 18pt; margin-top: 0; --text-opacity: 1; color: #ff5850;">'.htmlspecialchars($pseudo).'</font> !
                                        </p>
                                        <p class="sm-leading-32" style="font-weight: 600; font-size: 20px; margin: 0 0 16px; --text-opacity: 1; color: #263238; margin-top: 5%; color: #f8f9fa!important; text-align: center;">
                                            Merci pour votre participation !
                                        </p><br>
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

				mail($emailuser, "Participation à un évènement", $message, $header, $pseudo);
			} else {
				Alerts::setFlash("Votre participation a déjà été pris en compte.", "warning");
			}
		} else {
			Alerts::setFlash("Adresse email non valide.", "danger");
		}
	} else {
		Alerts::setFlash("Erreur lors de l'inscription, veuillez réessayer.", "danger");
	}
}

require "vue/evenements.php";

?>