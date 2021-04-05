<?php

class Database {

	private $bdd;
	private static $_instance = null;

	public function __construct() {
		$this->bdd = new PDO("mysql:host=".Config::get('hostname').";dbname=".Config::get('database')."", Config::get('username'), Config::get('motdepasse'));
	}

	public statif function getDB() {
		if (is_null(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
}

?>