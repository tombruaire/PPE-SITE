<?php

function footer() {
	$helper = new Helpers();
	echo $helper->footer();
}

function user() {
	$helper = new Helpers();
	if (isset($_SESSION['id'])) {
		echo "<ul class='navbar-nav'>";
		echo "<li class='nav-item dropdown'>";
		echo $helper->pseudo($_SESSION['pseudo']);
		echo "<div class='dropdown-menu dropdown-menu-end mt-1'>";
		echo $helper->dropdownItem('profil', 'Mon prolile');
		echo "<div class='dropdown-divider'></div>";
		echo $helper->dropdownItem('deconnexion', 'Déconnexion');
		echo "</div>";
		echo "</li>";
		echo "</ul>";
	} else {
		echo $helper->authButton('inscription', 'Inscription', 'success', 'me-2');
		echo $helper->authButton('connexion', 'Connexion','primary', '');
	}
}

function userIconNavBar() {
	$helper = new Helpers();
	if (isset($_SESSION['id'])) {
		echo $helper->userIcon();
	}
}

function logoutButton() {
	$helper = new Helpers();
	if (isset($_SESSION['id'])) {
		echo $helper->logout();
	}
}

?>
