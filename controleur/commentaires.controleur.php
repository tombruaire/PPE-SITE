<?php require "modele/commentaires.modele.php";

$contenuTextarea = "";
$edit = 0;

// INSERTION
if (isset($_POST['submit'])) {
	$user_id = $_SESSION['id'];
	$contenu = nl2br($_POST['contenu']);
	$idcom = $_POST['edit'];
	if ($_POST['edit'] == 0) {
		$insert = post($contenu, $user_id);
    	Alerts::setFlash("Votre commentaire a bien été posté !");
	} else {
		$update = update($contenu, $idcom);
		Alerts::setFlash("Votre commentaire a bien été modifié !");
	}
	$contenuTextarea = "";
	$edit = 0;
}

// MODIFICATION
if (isset($_GET['edit'])) {
	$idcom = intval($_GET['edit']);
	$requete = $bdd->query("SELECT * FROM commentaires WHERE idcom = '$idcom' ");
	$reponse = $requete->fetch();
	$contenuTextarea = $reponse['contenu'];
	$edit = $idcom;
}

// SUPPRESSION
if (isset($_GET['delete'])) {
    $idcom = intval($_GET['delete']);
    $bdd->query("DELETE FROM commentaires WHERE idcom = '$idcom' ");
    header('Location: commentaires');
}

require "vue/commentaires.php";

?>