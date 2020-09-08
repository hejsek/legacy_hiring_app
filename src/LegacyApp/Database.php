<?php
namespace LegacyApp;
use Dibi;
use Dibi\Connection;
use LegacyApp\Structures\User;

/**
 * @property \Dibi\Connection database
 * @author Jakub Heyduk
 */
class Database
{
	private Connection $database;

	public function __construct(string $address, string $user, string $password)
	{
		$this->database = $database = new Dibi\Connection([
			'driver'   => 'mysqli',
			'host'     => $address,
			'username' => $user,
			'password' => $password,
			'database' => 'legacy_app',
		]);
	}


	/**
	 * @return User[]
	 */
	public function getAllUsers() : array {
		$res = $this->database->query('SELECT * FROM users')->setRowFactory(function ($data) {
			if (isset($data["id"]) && isset($data["name"])) {
				return new User($data["id"], $data["name"]);
			}

			return NULL;
		});


		return $res->fetchAll();
	}


}