<?php require "modele/contact.modele.php";

if (isset($_POST['submit'])) {
	if (!empty($_POST['email_contact'])) {
		if (!empty($_POST['message'])) {
			$email_contact = htmlspecialchars($_POST['email_contact']);
			if (filter_var($email_contact, FILTER_VALIDATE_EMAIL)) {

				$sujet = htmlspecialchars($_POST['sujet']);
				$message = htmlspecialchars($_POST['message']);

				$header = "MIME-Version: 1.0\r\n";
				$header .= 'From: "mairievilliers"<votreemail@gmail.com>'."\n";
				$header .= 'Content-Type:text/html; charset="utf-8"'."\n";
				$header .= 'Content-Transfer-Encoding: 8bit';

				// Message envoyé au support
				$message_support = '
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<body>
<div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en">
    <table style="font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="--bg-opacity: 1; font-family: Montserrat, -apple-system, "Segoe UI", sans-serif;">
                <table class="sm-w-full" style="font-family: "Montserrat", Arial, sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td align="center" class="sm-px-24" style="font-family: "Montserrat", Arial, sans-serif;">
                            <table style="font-family: "Montserrat", Arial, sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: rgb(24, 26, 27); font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" align="left">
                                        <p style="font-weight: 600; font-size: 18pt; margin-bottom: 0; color: #212529!important; text-align: left; margin-left: 1%;">
                                            Message envoyé avec l\'adresse : 
                                            <font style="font-size: 18pt; color: green;">'.$_POST['email_contact'].'</font>
                                        </p>
                                        <br><hr><br>
                                        <p class="sm-leading-32" style="font-weight: 600; font-size: 20px; margin: 0 0 16px; --text-opacity: 1; color: #263238; margin-left: 1%; color: #212529!important; text-align: left;">
                                            '.nl2br($_POST['message']).'
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

				// Email reçu par le support
				mail("autreemail@gmail.com", $sujet, $message_support, $header);

				// Message envoyé à l'expéditeur pour le remercier
				$message_expediteur = '
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<body>
<div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en">
    <table style="font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="--bg-opacity: 1; font-family: Montserrat, -apple-system, "Segoe UI", sans-serif;">
                <table class="sm-w-full" style="font-family: "Montserrat", Arial, sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td align="center" class="sm-px-24" style="font-family: "Montserrat", Arial, sans-serif;">
                            <table style="font-family: "Montserrat", Arial, sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: rgb(24, 26, 27); font-family: Montserrat, -apple-system, "Segoe UI", sans-serif; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" align="left">
                                        <p style="font-weight: 600; font-size: 14pt; margin-bottom: 0; color: #212529!important; text-align: left; margin-left: 1%;">
                                            Bonjour,
                                        </p><br>
                                        <p class="sm-leading-32" style="font-weight: 600; font-size: 14pt; margin: 0 0 16px; --text-opacity: 1; color: #263238; margin-left: 1%; color: #212529!important; text-align: left;">
                                            Merci d\'avoir contacter le support !<br>
                                            Votre message est en cours de traitement.
                                        </p><br>
                                        <table style="font-family: "Montserrat",Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td style="font-family: "Montserrat",Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                                                    <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">&zwnj;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0 0 16px; text-align: center; color: #212529!important;">
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

				// Email reçu par l'expéditeur
				mail($email_contact, "mairievilliers", $message_expediteur, $header);
				Alerts::setFlash("Votre message a bien été envoyé !");
			} else {
				$erreur_invalid_email = "";
				Alerts::setFlash("<strong>Erreur :</strong> Format de l'adresse email invalide.", "warning");
			}
		} else {
			Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir un message.", "primary");
		}
	} else {
		Alerts::setFlash("<strong>Erreur :</strong> Veuillez saisir votre adresse email.", "primary");
	}
}

require "vue/contact.php";

?>