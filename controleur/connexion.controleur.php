<?php require "modele/connexion.modele.php";

if (isset($_SESSION['id'])) {
    header('Location: http://localhost/PPE-SITE/');
}

if (isset($_GET['success'])) {
    Alerts::setFlash("Votre mot de passe a bien été modifié.");
}

if (isset($_GET['confirmation'])) {
    Alerts::setFlash("Un email de de confirmation vous a été envoyé.");
}

// Confirmation du compte
if (isset($_GET['pseudo'], $_GET['numero']) AND !empty($_GET['pseudo']) AND !empty($_GET['numero'])) {
    $pseudo = htmlspecialchars($_GET['pseudo']);
    $numero = $_GET['numero'];
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo= :pseudo AND numero_confirmation = :numero_confirmation");
    $requser->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $requser->bindValue(':numero_confirmation', $numero, PDO::PARAM_INT);
    $requser->execute();
    $userexist = $requser->rowCount();
    if ($userexist == 1) {
        $user = $requser->fetch();
        if ($user['confirme'] == 0) {
            $updateuser = $bdd->prepare("UPDATE utilisateurs SET confirme = 1 WHERE pseudo = :pseudo AND numero_confirmation = :numero_confirmation");
            $updateuser->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $updateuser->bindValue(':numero_confirmation', $numero, PDO::PARAM_INT);
            $updateuser->execute();
            Alerts::setFlash("Votre compte a bien été confirmé !"); 
        } else {
            Alerts::setFlash("Votre compte a déjà été confirmé !");
        }
    } else {
        header('Location: http://localhost/PPE-SITE/');
    }
}

if (isset($_POST['connexion'])) {
    if (!empty($_POST['pseudo'])) {
        if (!empty($_POST['motdepasse'])) {
            $pseudo = $_POST['pseudo'];
            $motdepasse = sha1($_POST['motdepasse']);
            $requete = getUtilisateur($pseudo, $motdepasse);
            if ($requete) { // Si l'utilisateur existe
                if($requete['confirme'] == 0) { // Si le compte n'est pas confirmé
                    Alerts::setFlash("<strong>Veuillez confirmer votre compte.</strong>", "danger");
                } elseif ($requete['lvl'] == 0) {
                    Alerts::setFlash("<strong>Vous êtes pour le moment banni.</strong>", "danger");
                } else {
                    if (isset($_POST['remember-me'])) { // Si la checkbox "Rester connecté" est coché
                        setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
                        setcookie('motdepasse', $motdepasse, time() + 365*24*3600, null, null, false, true);
                    }
                    $session->setVar('id', $requete['id']);
                    $session->setVar('pseudo', $requete['pseudo']);
                    $session->setVar('prenom', $requete['prenom']);
                    $session->setVar('nom', $requete['nom']);
                    $session->setVar('email', $requete['email']);
                    header('Location: http://localhost/PPE-SITE/');
                }
            } else {
                Alerts::setFlash("Identifiants incorrects.", "danger");
            }
        } else {
            Alerts::setFlash("Veuillez saisir votre mot de passe", "warning");
        }
    } else {
        Alerts::setFlash("Veuillez saisir votre pseudo", "warning");
    }
}

require "vue/connexion.php"

?>