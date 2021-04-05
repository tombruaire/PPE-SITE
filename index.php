<?php require "core/Autoloader.php";
Autoloader::register();

$session = new Session();

require "core/Functions.php";
require "core/Constants.php";
require "modele/nav.modele.php";

$bdd = connectBDD(HOSTNAME, DATABASE, USERNAME, PASSWORD);

$helper = new Helpers();

if (isset($_GET['file'])) {   
    if(file_exists("controleur/".$_GET['file'].".controleur.php"))
        $page = $_GET['file'];
    else
        $page = "404";
} else {
    $page = "accueil";
}

ob_start();
require "controleur/".$page.".controleur.php";
$content = ob_get_clean();

include_once 'vue/cookieconnect.php';

if (isset($_COOKIE['accept_cookie'])) {
	$showcookie = false;
} else {
	$showcookie = true;
}

require "nav.php";

?>