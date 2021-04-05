<?php

if (!isset($_SESSION['id']) AND isset($_COOKIE['pseudo'],$_COOKIE['motdepasse']) AND !empty($_COOKIE['pseudo']) AND !empty($_COOKIE['motdepasse'])) {
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ? AND motdepasse = ?");
    $requser->execute(array($_COOKIE['pseudo'], $_COOKIE['motdepasse']));
    $userexist = $requser->rowCount();
    if ($userexist == 1) {
        $userinfo = $requser->fetch();
        $session->setVar('id', $userinfo['id']);
        $session->setVar('pseudo', $userinfo['pseudo']);
        $session->setVar('email', $userinfo['email']);
        header('Location: http://localhost/PPE-SITE-MVC/');
    }
}

?>