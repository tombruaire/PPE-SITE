<?php

class Session {
	public function __construct() {
		session_start();
	}
	public function setVar($key, $value) {
		$_SESSION[$key] = $value;
	}
	public function getVar($key) {
		return isset($_SESSION[$key]) ? $_SESSION[$key] : '';
	}
	public function exist($key) {
		return isset($_SESSION[$key]) ? true : false;
	}
	public function destroy() {
		setcookie('pseudo', '', time()-3600);
		setcookie('motdepasse', '', time()-3600);
		$_SESSION = array();
		session_destroy();
		header('Location: connexion');
		exit();
	}
}

?>